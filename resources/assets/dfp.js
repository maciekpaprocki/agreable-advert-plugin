window.googletag = window.googletag || {};
googletag.cmd = googletag.cmd || [];

(function() {
  var gads = document.createElement("script");
  gads.async = true;
  gads.type = "text/javascript";
  var useSSL = "https:" == document.location.protocol;
  gads.src = (useSSL ? "https:" : "http:") + "//www.googletagservices.com/tag/js/gpt.js";
  var node =document.getElementsByTagName("script")[0];
  node.parentNode.insertBefore(gads, node);

  window.googletag.cmd.push(function() {
    googletag.pubads().collapseEmptyDivs();
    googletag.pubads().enableAsyncRendering();
    googletag.enableServices();
  })
})();
