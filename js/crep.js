function removeAfter(string, pattern) {
  var n = string.indexOf(pattern);
  return string.substring(0, n != -1 ? n : string.length);
}

function pageName(href) {
  if (href.indexOf(window.location.host) >= 0) {
    href = removeAfter(removeAfter(href, '?'), '#');
    hrefE = href.split('/');
    return hrefE[hrefE.length - 1];
  }
  return false;
}

function updateScrollData() {
  history.state.scrollTop = $(document.body).scrollTop();
  history.replaceState(history.state);
}

function pageSpecific(location) {
  if (pageName(location) == 'contact') {
    initializeMap();
  }
  $(document).scroll(updateScrollData);
}



function actLink(ev) {
  var location = ev.currentTarget.href;
  var page = pageName(location);
  if (page && page != pageName(window.location.href)) {
    loadDoc(location, function() {
      history.pushState({
        loc: location
      }, document.title, location);
    });
    return false;
  }
}

function dynamiseLinks(el) {
  $("a", el).click(actLink);
}

function loadDoc(location, callback) {
  if (!callback) {
    callback = function() {
      return undefined;
    };
  }
  var eventsLeft = 2;
  var html = '';
  var mainContainer = $("#mainContainer");
  var oldHeight = mainContainer.height();

  function events() {
      eventsLeft += -1;
      if (eventsLeft <= 0) {
        // In
        //  Calculations
        mainContainer.html(html);
        mainContainer.height('auto');
        newHeight = mainContainer.height();
        mainContainer.height(oldHeight);
        //  Transition
        mainContainer.animate({
          height: newHeight,
          opacity: 1,
        }, 'fast', function() {
          mainContainer.height('auto');
          dynamiseLinks(mainContainer);
          pageSpecific(location);
          callback();
        });
      }
    }
    // Out
  $(document).off('scroll', updateScrollData);
  $(document.body).animate({
    scrollTop: $('.navbar-lower').height()
  }, 'fast');
  $.get(location + '?c', function(data) {
    html = data;
    events();
  });
  mainContainer.height(oldHeight);
  mainContainer.animate({
    opacity: 0
  }, 'fast', events);
}

function historyChange(ev) {
  loadDoc(ev.state.loc, function() {
    if (ev.state.scrollTop > $('.navbar-lower').height()) {
      $(document.body).animate({
        scrollTop: ev.state.scrollTop
      }, 'fast');
    }
  });
}

$(document).ready(function() {
  dynamiseLinks(document.body);
  var current = window.location.href;
  pageSpecific(current);
  history.replaceState({
    loc: current
  }, document.title, current);
  window.onpopstate = historyChange;
  $('.navbar-fixed-top .navbar-toggle').click(function() {
    $(document.body).animate({
      scrollTop: 0
    });
  });
});

function initializeMap() {
  var mapCanvas = document.getElementById('map-canvas');
  mapCanvas.innerHTML = '';
  var polytechPos = new google.maps.LatLng(50.6074998, 3.1373338);
  var mapOptions = {
    center: polytechPos,
    zoom: 16,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  };
  var map = new google.maps.Map(mapCanvas, mapOptions);
  var marker = new google.maps.Marker({
    place: {
      location: polytechPos,
      query: "Polytech Lille"
    },
    attribution: {
      source: "Coupe de Robotique des Écoles Primaires",
      webUrl: window.location.host
    },
    map: map,
    title: "Polytech Lille"
  });
  var infowindow = new google.maps.InfoWindow({
    content: "<strong>Polytech Lille</strong><br/>Lieux des évènements de la Coupe de Robotique des Écoles Primaires"
  });
  marker.addListener('click', function() {
    infowindow.open(map, this);
  });
}
