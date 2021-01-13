import React from "react";

export class Footer extends React.Component{
    render() {
        return(   
            <footer className="footer-area">
                
                <div className="main-footer-area">
                    <div className="container">
                        <div className="row">
                            
                            <div className="col-12 col-sm-6 col-lg-4">
                                <div className="footer-widget-area mt-80">
                                
                                    <div className="footer-logo">
                                        <a href="index.html"><img src="{{asset('img/core-img/logo.png')}}" alt=""/></a>
                                    </div>
                                
                                    <ul className="list">
                                        <li><a href="mailto:contact@youremail.com">contact@youremail.com</a></li>
                                        <li><a href="tel:+4352782883884">+43 5278 2883 884</a></li>
                                        <li><a href="http://yoursitename.com">www.yoursitename.com</a></li>
                                    </ul>
                                </div>
                            </div>

                        
                            <div className="col-12 col-sm-6 col-lg-2">
                                <div className="footer-widget-area mt-80">
                                
                                    <h4 className="widget-title">Politics</h4>
                                    
                                    <ul className="list">
                                        <li><a href="#">Business</a></li>
                                        <li><a href="#">Markets</a></li>
                                        <li><a href="#">Tech</a></li>
                                        <li><a href="#">Luxury</a></li>
                                    </ul>
                                </div>
                            </div>

                        
                            <div className="col-12 col-sm-4 col-lg-2">
                                <div className="footer-widget-area mt-80">
                                    
                                    <h4 className="widget-title">Featured</h4>
                                
                                    <ul className="list">
                                        <li><a href="#">Football</a></li>
                                        <li><a href="#">Golf</a></li>
                                        <li><a href="#">Tennis</a></li>
                                        <li><a href="#">Motorsport</a></li>
                                        <li><a href="#">Horseracing</a></li>
                                        <li><a href="#">Equestrian</a></li>
                                        <li><a href="#">Sailing</a></li>
                                        <li><a href="#">Skiing</a></li>
                                    </ul>
                                </div>
                            </div>

                        
                            <div className="col-12 col-sm-4 col-lg-2">
                                <div className="footer-widget-area mt-80">
                                
                                    <h4 className="widget-title">FAQ</h4>
                                    
                                    <ul className="list">
                                        <li><a href="#">Aviation</a></li>
                                        <li><a href="#">Business</a></li>
                                        <li><a href="#">Traveller</a></li>
                                        <li><a href="#">Destinations</a></li>
                                        <li><a href="#">Features</a></li>
                                        <li><a href="#">Food/Drink</a></li>
                                        <li><a href="#">Hotels</a></li>
                                        <li><a href="#">Partner Hotels</a></li>
                                    </ul>
                                </div>
                            </div>

                        
                            <div className="col-12 col-sm-4 col-lg-2">
                                <div className="footer-widget-area mt-80">
                                
                                    <h4 className="widget-title">+More</h4>
                                
                                    <ul className="list">
                                        <li><a href="#">Fashion</a></li>
                                        <li><a href="#">Design</a></li>
                                        <li><a href="#">Architecture</a></li>
                                        <li><a href="#">Arts</a></li>
                                        <li><a href="#">Autos</a></li>
                                        <li><a href="#">Luxury</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        );
    }
}
