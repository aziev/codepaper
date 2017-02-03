const ROOT = document.querySelector('meta[name=root]').getAttribute('content') + '/';

var $logo = document.querySelector('.logo');

if (typeof SVGRect == "undefined")
{
    var $image = document.createElement('img');
    $image.src = ROOT + 'img/logo.png';

    $logo.innerHTML = '';
    $logo.appendChild($image);
}

//# sourceMappingURL=all.js.map
