<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title><?php the_title(); ?></title>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.5/jszip.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/epubjs/dist/epub.min.js"></script>

    <style type="text/css">



        .epub-container .epub-view > iframe {
            background: white;
            box-shadow: 0 0 4px #ccc;
        }

        .epub-container {
            overflow: visible !important;
        }

        #viewer {
            height: 100vh;
            /* overflow: auto; */
            margin: 0 auto;
        }


    </style>
</head>

<body>
<div id="viewer"></div>

</body>
<script>


    var params = URLSearchParams && new URLSearchParams(document.location.search.substring(1));
    var url = params && params.get("url") && decodeURIComponent(params.get("url"));
    var currentSectionIndex = (params && params.get("loc")) ? params.get("loc") : undefined;
    // Load the opf
    var book = ePub("<?php echo wp_get_attachment_url(); ?>");
    var rendition = book.renderTo("viewer", {
        manager: "continuous",
        flow: "scrolled",
        width: "100%",
        height: "100%"

    });
    var displayed = rendition.display(currentSectionIndex);

    displayed.then(function(renderer){
        document.getElementById('epubjs-view-3cc60011-fc7a-44c7-c840-3203e3f9485a').addEventListener( "click", function( event ) {
            var x = event.pageX ;
            var y = event.pageY ;

            alert(x);
            console.log(y);
        } ) ;
    });

    // Navigation loaded
    book.loaded.navigation.then(function(toc){
        // console.log(toc);
    });




    // var iframeElem = document.getElementsByTagName('iframe').contentWindow.document;
    // var detail = iframeElem.getElementsByTagName('img');
    // alert(detail.outerHTML);

</script>
</html>