<html lang="en">

<head>
  <title>Multiselect 01</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&amp;display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/A.style.css.pagespeed.cf.qPbvjyJmiR.css">
  <script defer="" referrerpolicy="origin" src="/cdn-cgi/zaraz/s.js?z=JTdCJTIyZXhlY3V0ZWQlMjIlM0ElNUIlNUQlMkMlMjJ0JTIyJTNBJTIyTXVsdGlzZWxlY3QlMjAwMSUyMiUyQyUyMnglMjIlM0EwLjY0NDMzNjA5NDEwMjc2NTQlMkMlMjJ3JTIyJTNBMTM2MCUyQyUyMmglMjIlM0E3NjglMkMlMjJqJTIyJTNBNTk3JTJDJTIyZSUyMiUzQTEzNjAlMkMlMjJsJTIyJTNBJTIyaHR0cHMlM0ElMkYlMkZwcmV2aWV3LmNvbG9ybGliLmNvbSUyRnRoZW1lJTJGYm9vdHN0cmFwJTJGbXVsdGlzZWxlY3QtMDElMkYlMjIlMkMlMjJyJTIyJTNBJTIyaHR0cHMlM0ElMkYlMkZjb2xvcmxpYi5jb20lMkYlMjIlMkMlMjJrJTIyJTNBMjQlMkMlMjJuJTIyJTNBJTIyVVRGLTglMjIlMkMlMjJvJTIyJTNBMCUyQyUyMnElMjIlM0ElNUIlNUQlN0Q="></script>
  <script nonce="a3f49f81-2623-4bb1-88f2-362429c15267">
    (function(w, d) {
      ! function(Z, _, ba, bb) {
        Z.zarazData = Z.zarazData || {};
        Z.zarazData.executed = [];
        Z.zaraz = {
          deferred: [],
          listeners: []
        };
        Z.zaraz.q = [];
        Z.zaraz._f = function(bc) {
          return function() {
            var bd = Array.prototype.slice.call(arguments);
            Z.zaraz.q.push({
              m: bc,
              a: bd
            })
          }
        };
        for (const be of ["track", "set", "debug"]) Z.zaraz[be] = Z.zaraz._f(be);
        Z.zaraz.init = () => {
          var bf = _.getElementsByTagName(bb)[0],
            bg = _.createElement(bb),
            bh = _.getElementsByTagName("title")[0];
          bh && (Z.zarazData.t = _.getElementsByTagName("title")[0].text);
          Z.zarazData.x = Math.random();
          Z.zarazData.w = Z.screen.width;
          Z.zarazData.h = Z.screen.height;
          Z.zarazData.j = Z.innerHeight;
          Z.zarazData.e = Z.innerWidth;
          Z.zarazData.l = Z.location.href;
          Z.zarazData.r = _.referrer;
          Z.zarazData.k = Z.screen.colorDepth;
          Z.zarazData.n = _.characterSet;
          Z.zarazData.o = (new Date).getTimezoneOffset();
          Z.zarazData.q = [];
          for (; Z.zaraz.q.length;) {
            const bl = Z.zaraz.q.shift();
            Z.zarazData.q.push(bl)
          }
          bg.defer = !0;
          for (const bm of [localStorage, sessionStorage]) Object.keys(bm || {}).filter((bo => bo.startsWith("_zaraz_"))).forEach((bn => {
            try {
              Z.zarazData["z_" + bn.slice(7)] = JSON.parse(bm.getItem(bn))
            } catch {
              Z.zarazData["z_" + bn.slice(7)] = bm.getItem(bn)
            }
          }));
          bg.referrerPolicy = "origin";
          bg.src = "/cdn-cgi/zaraz/s.js?z=" + btoa(encodeURIComponent(JSON.stringify(Z.zarazData)));
          bf.parentNode.insertBefore(bg, bf)
        };
        ["complete", "interactive"].includes(_.readyState) ? zaraz.init() : Z.addEventListener("DOMContentLoaded", zaraz.init)
      }(w, d, 0, "script");
    })(window, document);
  </script>
</head>

<body>
  <section class="ftco-section">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6 text-center mb-5">
          <h2 class="heading-section">Multiselect #01</h2>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-md-8 col-lg-5 d-flex justify-content-center align-items-center">
          <div class="d-flex text-left align-items-center w-100">
            <strong class="sl">Select Language:</strong>
            <select id="multiple-checkboxes" multiple="multiple" style="display: none;">
              <option value="php">PHP</option>
              <option value="javascript">JavaScript</option>
              <option value="java">Java</option>
              <option value="sql">SQL</option>
              <option value="jquery">Jquery</option>
              <option value=".net">.Net</option>
            </select>
            <div class="btn-group"><button type="button" class="multiselect dropdown-toggle btn btn-default" data-toggle="dropdown" title="None selected" aria-expanded="false"><span class="multiselect-selected-text">None selected</span> <b class="caret"></b></button>
              <ul class="multiselect-container dropdown-menu" x-placement="top-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, -205px, 0px);">
                <li class="multiselect-item multiselect-all"><a tabindex="0" class="multiselect-all"><label class="checkbox"><input type="checkbox" value="multiselect-all"> Select all</label></a></li>
                <li class=""><a tabindex="0"><label class="checkbox"><input type="checkbox" value="php"> PHP</label></a></li>
                <li><a tabindex="0"><label class="checkbox"><input type="checkbox" value="javascript"> JavaScript</label></a></li>
                <li><a tabindex="0"><label class="checkbox"><input type="checkbox" value="java"> Java</label></a></li>
                <li class=""><a tabindex="0"><label class="checkbox"><input type="checkbox" value="sql"> SQL</label></a></li>
                <li><a tabindex="0"><label class="checkbox"><input type="checkbox" value="jquery"> Jquery</label></a></li>
                <li><a tabindex="0"><label class="checkbox"><input type="checkbox" value=".net"> .Net</label></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <script src="js/jquery.min.js"></script>
  <script src="js/popper.js+bootstrap.min.js.pagespeed.jc.k4iQfgA4Y5.js"></script>
  <script>
    eval(mod_pagespeed_quTnGdkXuC);
  </script>
  <script>
    eval(mod_pagespeed_idwUfhoIg1);
  </script>
  <script src="js/bootstrap-multiselect.js+main.js.pagespeed.jc._yonCvQ6T6.js"></script>
  <script>
    eval(mod_pagespeed_OnYxrIYgyi);
  </script>
  <script>
    eval(mod_pagespeed_ecE0jZ1vKW);
  </script>
  <script defer="" src="https://static.cloudflareinsights.com/beacon.min.js/vaafb692b2aea4879b33c060e79fe94621666317369993" integrity="sha512-0ahDYl866UMhKuYcW078ScMalXqtFJggm7TmlUtp0UlD4eQk0Ixfnm5ykXKvGJNFjLMoortdseTfsRT8oCfgGA==" data-cf-beacon="{&quot;rayId&quot;:&quot;7614ae62e9d569e8&quot;,&quot;token&quot;:&quot;cd0b4b3a733644fc843ef0b185f98241&quot;,&quot;version&quot;:&quot;2022.10.3&quot;,&quot;si&quot;:100}" crossorigin="anonymous"></script>


</body>

</html>