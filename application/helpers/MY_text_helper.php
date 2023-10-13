<?php

function word_limiter($str, $n = 100, $end_char = '…') {
    if (strlen($str) < $n) {
        return closeTags($str);
    }

    $words = explode(' ', preg_replace("/\s+/", ' ', preg_replace("/(\r\n|\r|\n)/", " ", $str)));

    if (count($words) <= $n) {
        return closeTags($str);
    }

    $str = '';
    for ($i = 0; $i < $n; $i++) {
        $str .= $words[$i] . ' ';
    }

    $str = closeTags($str);
    return trim($str) . $end_char;
}

function closeTags($string) {
    // coded by Constantin Gross <connum at googlemail dot com> / 3rd of June, 2006
    // (Tiny little change by Sarre a.k.a. Thijsvdv)
    $donotclose = array('br', 'img', 'input'); //Tags that are not to be closed
    //prepare vars and arrays
    $tagstoclose = '';
    $tags = array();

    //put all opened tags into an array  /<(([A-Z]|[a-z]).*)(( )|(>))/isU
    preg_match_all("/<(([A-Z]|[a-z]).*)(( )|(>))/isU", $string, $result);
    $openedtags = $result[1];
    // Next line escaped by Sarre, otherwise the order will be wrong
    // $openedtags=array_reverse($openedtags);
    //put all closed tags into an array
    preg_match_all("/<\/(([A-Z]|[a-z]).*)(( )|(>))/isU", $string, $result2);
    $closedtags = $result2[1];

    //look up which tags still have to be closed and put them in an array
    for ($i = 0; $i < count($openedtags); $i++) {
        if (in_array($openedtags[$i], $closedtags)) {
            unset($closedtags[array_search($openedtags[$i], $closedtags)]);
        } else
            array_push($tags, $openedtags[$i]);
    }

    $tags = array_reverse($tags); //now this reversion is done again for a better order of close-tags
    //prepare the close-tags for output
    for ($x = 0; $x < count($tags); $x++) {
        $add = strtolower(trim($tags[$x]));
        if (!in_array($add, $donotclose))
            $tagstoclose.='</' . $add . '>';
    }

//and finally
    return $string . $tagstoclose;
}

function cut_text($text, $number, $url = "") {
    $options = array(
        'ellipsis' => '...', 
        'exact' => true, 
        'html' => true
    );
    return cakephp_truncate($text, $number, $options, $url);
}

function cakephp_truncate($text, $length = 100, $options = array(), $url = "") {
    $default = array(
        'ellipsis' => '...', 'exact' => true, 'html' => false
    );
    if (isset($options['ending'])) {
        $default['ellipsis'] = $options['ending'];
    }
    $options = array_merge($default, $options);
    extract($options);
    if (!function_exists('mb_strlen')) {
        class_exists('Multibyte');
    }
    if ($html) {
        if (mb_strlen(preg_replace('/<.*?>/', '', $text)) <= $length) {
            return $text;
        }
        $totalLength = mb_strlen(strip_tags($ellipsis));
        $openTags = array();
        $truncate = '';
        preg_match_all('/(<\/?([\w+]+)[^>]*>)?([^<>]*)/', $text, $tags, PREG_SET_ORDER);
        foreach ($tags as $tag) {
            if (!preg_match('/img|br|input|hr|area|base|basefont|col|frame|isindex|link|meta|param/s', $tag[2])) {
                if (preg_match('/<[\w]+[^>]*>/s', $tag[0])) {
                    array_unshift($openTags, $tag[2]);
                } elseif (preg_match('/<\/([\w]+)[^>]*>/s', $tag[0], $closeTag)) {
                    $pos = array_search($closeTag[1], $openTags);
                    if ($pos !== false) {
                        array_splice($openTags, $pos, 1);
                    }
                }
            }
            $truncate .= $tag[1];
            $contentLength = mb_strlen(preg_replace('/&[0-9a-z]{2,8};|&#[0-9]{1,7};|&#x[0-9a-f]{1,6};/i', ' ', $tag[3]));
            if ($contentLength + $totalLength > $length) {
                $left = $length - $totalLength;
                $entitiesLength = 0;
                if (preg_match_all('/&[0-9a-z]{2,8};|&#[0-9]{1,7};|&#x[0-9a-f]{1,6};/i', $tag[3], $entities, PREG_OFFSET_CAPTURE)) {
                    foreach ($entities[0] as $entity) {
                        if ($entity[1] + 1 - $entitiesLength <= $left) {
                            $left--;
                            $entitiesLength += mb_strlen($entity[0]);
                        } else {
                            break;
                        }
                    }
                }
                $truncate .= mb_substr($tag[3], 0, $left + $entitiesLength);
                break;
            } else {
                $truncate .= $tag[3];
                $totalLength += $contentLength;
            }
            if ($totalLength >= $length) {
                break;
            }
        }
    } else {
        if (mb_strlen($text) <= $length) {
            return $text;
        }
        $truncate = mb_substr($text, 0, $length - mb_strlen($ellipsis));
    }
    if (!$exact) {
        $spacepos = mb_strrpos($truncate, ' ');
        if ($html) {
            $truncateCheck = mb_substr($truncate, 0, $spacepos);
            $lastOpenTag = mb_strrpos($truncateCheck, '<');
            $lastCloseTag = mb_strrpos($truncateCheck, '>');
            if ($lastOpenTag > $lastCloseTag) {
                preg_match_all('/<[\w]+[^>]*>/s', $truncate, $lastTagMatches);
                $lastTag = array_pop($lastTagMatches[0]);
                $spacepos = mb_strrpos($truncate, $lastTag) + mb_strlen($lastTag);
            }
            $bits = mb_substr($truncate, $spacepos);
            preg_match_all('/<\/([a-z]+)>/', $bits, $droppedTags, PREG_SET_ORDER);
            if (!empty($droppedTags)) {
                if (!empty($openTags)) {
                    foreach ($droppedTags as $closingTag) {
                        if (!in_array($closingTag[1], $openTags)) {
                            array_unshift($openTags, $closingTag[1]);
                        }
                    }
                } else {
                    foreach ($droppedTags as $closingTag) {
                        $openTags[] = $closingTag[1];
                    }
                }
            }
        }
        $truncate = mb_substr($truncate, 0, $spacepos);
    }
    if ($url == "") {
        $truncate .= $ellipsis;
    } else {
        $truncate .= '<a href="' . $url . '"> Leer más' . $ellipsis . '</a>';
    }
    if ($html) {
        foreach ($openTags as $tag) {
            $truncate .= '</' . $tag . '>';
        }
    }
    return $truncate;
}
