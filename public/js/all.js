const ROOT = document.querySelector('meta[name=root]').getAttribute('content') + '/';

var $logo = document.querySelector('.logo');

if (!supportsSvg())
{
    var $image = document.createElement('img');
    $image.src = ROOT + 'img/logo.png';

    $logo.innerHTML = '';
    $logo.appendChild($image);
}

function supportsSvg() {
    return document.implementation.hasFeature("http://www.w3.org/TR/SVG11/feature#Shape", "1.0")
}

//# sourceMappingURL=all.js.map
