// Share Link Generator JS
window.onload = setShareLinks;

function setShareLinks() {
  var pageUrl = encodeURIComponent(document.URL);
  var pageTitle = encodeURIComponent(document.title);

  document.addEventListener('click', function (event) {  
    let url = null;
    
    if (event.target.classList.contains('share__link--facebook')) {
      url = "https://www.facebook.com/sharer.php?u=" + pageUrl;
      socialWindow(url, 570, 570);
    }

    if (event.target.classList.contains('share__link--twitter')) {
      url = "https://twitter.com/intent/tweet?url=" + pageUrl + "&text=" + pageTitle;
      socialWindow(url, 570, 300);
    }

    if (event.target.classList.contains('share__link--linkedin')) {
      url = "https://www.linkedin.com/shareArticle?mini=true&url=" + pageUrl;
      socialWindow(url, 570, 570);
    }

    if (event.target.classList.contains('share__link--whatsapp')) {
      url = "whatsapp://send?text=" + pageTitle + "%20" + pageUrl;
      socialWindow(url, 570, 450);
    }

    if (event.target.classList.contains('share__link--mail')) {
      url = "mailto:?subject=%22" + pageTitle + "%22&body=Read%20the%20article%20%22" + pageTitle + "%22%20on%20" + pageUrl;
      socialWindow(url, 570, 450);
    }

	// if (event.target.classList.contains('share__link--instagram)) {
	// 	url = "https://www.instagram.com/sharer.php?u=" + pageUrl;
	// 	socialWindow(url, 570, 450);
	// }

  }, false);
}

function socialWindow(url, width, height) {
  var left = (screen.width - width) / 2;
  var top = (screen.height - height) / 2;
  var params = "menubar=no,toolbar=no,status=no,width=" + width + ",height=" + height + ",top=" + top + ",left=" + left;
  window.open(url,"",params);
}