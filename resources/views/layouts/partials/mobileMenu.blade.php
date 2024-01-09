<!-- Mobile Menu  -->
<div class="mobile-menu">
    <div class="menu-backdrop"></div>
    <div class="close-btn"><i class="fas fa-times"></i></div>
    
    <nav class="menu-box">
        <div class="nav-logo"><a href="{{LaravelLocalization::localizeUrl('/')}}"><img src="{{Helper::uploadedImagesPath('settings',$configration->footer_logo)}}" alt="App logo"></a></div>
        <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
        <div class="contact-info">
            <h4>Contact Info</h4>
            <ul>
                <li><a href="#">Nasr City, 25 Asmaa Fahmy</a></li>
                <li><a href="tel:0101212121">0101212121</a></li>
                <li><a href="mailto:info@trademark.com">info@trademark.com</a></li>
            </ul>
        </div>
        <div class="social-links">
            <ul class="clearfix">
                <li><a href="index.html"><span class="fab fa-facebook-square"></span></a></li>
                <li><a href="index.html"><span class="fab fa-instagram"></span></a></li>
            </ul>
        </div>
    </nav>
</div><!-- End Mobile Menu -->