<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="token" content="{{ Session::token() }}">
<title>Welcome</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />

<!-- PRICE RANGE -->
<link rel="stylesheet" href="css/jslider.css" type="text/css">
<script type="text/javascript" src="/js/jquery-1.7.1.js"></script>
<script type="text/javascript" src="/js/jshashtable-2.1_src.js"></script>
<script type="text/javascript" src="/js/jquery.numberformatter-1.2.3.js"></script>
<script type="text/javascript" src="/js/tmpl.js"></script>
<script type="text/javascript" src="/js/jquery.dependClass-0.1.js"></script>
<script type="text/javascript" src="/js/draggable-0.1.js"></script>
<script type="text/javascript" src="/js/jquery.slider.js"></script>


<script type="text/javascript" src="/js/customInput.jquery.js"></script>
<script type="text/javascript">
    // Run the script on DOM ready:
    $(function(){
        $('input').customInput();
    });
</script>

<script type="text/javascript" src="/js/jquery.jscrollpane.min.js"></script>
<script type="text/javascript" src="/js/jquery.styleSelect.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        var options = {
                styleClass: "selectDark",
                jScrollPane: 1
                }
        $(".mySelect").styleSelect(options);
    });
</script>

</head><body>
<div id="main">
    <div class="header">
        <div class="logo"><a href="#"><img src="/images/logo.png" alt="" /></a></div>
        <form id="initSearch">
            <div class="search_holder">
                <input name="city" type="text" value="" placeholder="Mumbai, New York, London, Hong Kong, Paris" />
                <input name="date" type="text" value="8/27" class="calendar" />
                <select name="nights" class="mySelect">
                    <option value='4'>4 Nights</option>
                </select>
                <span style="float:left;">&nbsp;</span>
                <select name="guests" class="mySelect">
                    <option value='1'>1 Guest</option>
                    <option value='2'>2 Guests</option>
                    <option value='3'>3 Guests</option>
                    <option value='4'>4 Guests</option>
                </select>
                <input name="" type="submit" value="" class="btn_style" />
            </div>            
        {{-- </form> --}}
    </div>
    <div class="details_holder">
        {{-- <form id="sidebarFilter"> --}}
        <div class="sidebar">
            <h2>Price Range</h2>
            <div class="sidebar_text">
                <div class="layout-slider" style="width: 100%">
                    <span style="display:inline-block; width:155px; padding:0 5px;">
                        <input id="Slider1" type="slider" name="price" value="0;500" />
                    </span>
                </div>
            </div>
            <h2>Room Type</h2>
            <div class="sidebar_text">
                <fieldset>
                    <input type="checkbox" name="type" id="check-1" value="mixed" />
                    <label for="check-1">Mixed Dorm</label>
                    <input type="checkbox" name="type" id="check-2" value="female" />
                    <label for="check-2">Female Dorm</label>
                    <input type="checkbox" name="type" id="check-3" value="double" />
                    <label for="check-3">Double</label>
                    <input type="checkbox" name="type" id="check-4" value="private" />
                    <label for="check-4">Private</label>
                    <input type="checkbox" name="type" id="check-5" value="family" />
                    <label for="check-5">Family</label>
                </fieldset>
            </div>
            <h2>Rating</h2>
            <div class="sidebar_text">
                <fieldset>
                    <input type="checkbox" name="rating" id="check-6" value="0" />
                    <label for="check-6"> &gt; 90%</label>
                    <input type="checkbox" name="rating" id="check-7" value="1" />
                    <label for="check-7">85 - 90%</label>
                    <input type="checkbox" name="rating" id="check-8" value="2" />
                    <label for="check-8">80 - 85%</label>
                    <input type="checkbox" name="rating" id="check-9" value="3" />
                    <label for="check-9">< 80%</label>
                </fieldset>
            </div>
            <h2>Facitilites</h2>
            <div class="sidebar_text"><img src="images/facility1-color.png" alt="" /> <img src="images/facility2-color.png" alt="" /> <img src="images/facility3-grey.png" alt="" /> <img src="images/facility4-grey.png" alt="" /> </div>
            <h2>Preferences</h2>
            <div class="sidebar_text">
                <select name="" class="mySelect">
                    <option value="usd">USD</option>
                </select>
                <br clear="all" /><br />
                <select name="" class="mySelect">
                    <option>Englisn</option>
                </select>
            </div>
        </div>
        </form>
        <div class="main_content" id="main_content">
        
        
        </div>
    </div>
</div>

<script type="text/javascript" charset="utf-8">
    jQuery("#Slider1").slider({ from: 20, to: 1000, step: 1, smooth: true, round: 0, dimension: "&nbsp;$", skin: "plastic" });
</script>

<script type="text/template" id="productRowTemplate">
    <div class="product_container">
        <div class="tab_holder">
            <div class="tab_text"><img src="images/ico1-color.png" alt="" /> <span class="color">Hostel</span></div>
            <div class="tab_text"><img src="images/ico2-grey.png" alt="" /> <span>NE1up4</span></div>
            <div class="tab_text"><img src="images/ico3-grey.png" alt="" /> <span>Reviews <strong><%= rating %>%</strong></span></div>
        </div>
        <div class="prd_img"><img src="images/img1.jpg" alt="" /></div>
        <div class="prd_text">
            <div class="text1"><strong><%= name %></strong> <span>$<%= base_price %></span><br /><%= address %></div>
            <div class="text2"><%= description %> - <%= room_type %></div>
        </div>
    </div>  
</script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/backbone.js/1.2.2/backbone-min.js"></script>
<script src="/js/app.js"></script>
</body></html>
