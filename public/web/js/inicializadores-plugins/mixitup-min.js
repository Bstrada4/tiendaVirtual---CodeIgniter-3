/*ACTIVIDADES*/
var containerEl = document.querySelector('[data-ref="mixitup-container"]');
var mixituo_val = $('.mixitup-recetas-gal').val();

if (containerEl != null) {
    var mixer = mixitup(containerEl, {
        selectors: {
            target: '[data-ref~="mixitup-target"]'
        },
        load: {
          filter: '.'+mixituo_val
        },
        controls: {
            scope: 'local'
        },
        animation: {
            effects: 'fade translateZ(-100px)'
        }
    });

}

/*MULTIMEDIA*/
var containerEl2 = document.querySelector('[data-ref="mixitup-container2"]');

if (containerEl2 != null) {
    var mixer2 = mixitup(containerEl2, {
        selectors: {
            target: '[data-ref~="mixitup-target"]'
        },
        load: {
          filter: '.foto'
        },
        controls: {
            scope: 'local'
        }
    });   
}



/*
<div class="col-lg-12">
    <div class="box_portafolio">
        <div class="head_navigation">
            <ul class="controls">
                <li class="d-none"><a class="control" data-filter="all"></a></li>
                <li><a class="control active  mixitup-control-active" data-filter=".first2017">2017</a></li>
                <li class="d-none"><a class="control" data-filter="all"></a></li>
                <li><a class="control" data-filter=".first2018">2018</a></li>
                <li class="d-none"><a class="control" data-filter="all"></a></li>
                <li><a class="control" data-filter=".first2019">2019</a></li>
                <!--li><a class="control" data-filter=".brochure">DISEÑO DE BROCHURE</a></li>
                <li><a class="control" data-sort="default:asc">Asc</a></li>
                <li><a class="control" data-sort="default:desc">Desc</a></li-->
            </ul>
        </div>
    </div>
</div>

<div class="col-lg-12">
    <div class="content_mixitup">
        <ul class="list_mixitup" id="gallery-multimedia">
            <li class="item first2017" data-ref="mixitup-target">
                <div class="box_galeria">
                    <a href="{$base_url}public/img/recetas/receta1.jpg"><img src="{$base_url}public/img/recetas/receta1.jpg" width="100%"></a>
                </div>
            </li>

            
        </ul>
    </div>
</div>

*/

