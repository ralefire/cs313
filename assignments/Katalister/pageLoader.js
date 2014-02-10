function oldValue()
{
    old = 'v';
}

function load(url, id, callerID) {
    var httprequest = null;
    if (window.XMLHttpRequest) {
        httprequest = new XMLHttpRequest();
    } else {
        try {
            httprequest = new ActiveXObject("Microsoft.XMLHTTP");
        } catch (ex) {
            alert("This webpage cannot load in your browser.\nPlease update your browser.");
        }
    }

    httprequest.onreadystatechange = function () {
        if (httprequest.readyState == 4)
            if (httprequest.status == 200) {
                document.getElementById(id).innerHTML = httprequest.responseText;
            } else {
                alert("Error loading page.\nPlease try again.");
            }
    }
    
    document.getElementById(old).setAttribute("style", "background-color: none");
    callerID.setAttribute("style", "background-color:#8CCBF9");
    old = callerID.id;
    
    var cat = callerID.children[1].innerHTML
    
    if (callerID.id == "c")
    {
       cat = 'clothing & apparel';
    }

    document.getElementById('search').setAttribute("placeholder", 'Search in ' + cat + "...");

    httprequest.open("GET", url, true);
    httprequest.send(null);
}

function loadScript(url) {
    var tryCount = 0;
    var httprequest = null;
    if (window.XMLHttpRequest) {
        httprequest = new XMLHttpRequest();
    } else {
        try {
            httprequest = new ActiveXObject("Microsoft.XMLHTTP");
        } catch (ex) {
            alert("This webpage cannot load in your browser.\nPlease update your browser.");
        }
    }

    httprequest.onreadystatechange = function () {
        if (httprequest.readyState == 4)
            if (httprequest.status == 200) {
                document.getElementById("scriptHolder").innerHTML = httprequest.responseText;
            } else {
                if (tryCount++ < 5) {
                    load(url);
                }
                alert("Error loading page.\nPlease try again.");
            }
    }

    httprequest.open("GET", url, true);
    httprequest.send(null);
}
