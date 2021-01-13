import React from "react";

export class PopularNewsArea extends React.Component{
    render() {
        return(
            <div className="popular-news-area section-padding-80-50">
                <div className="container">
                    <div className="row">
                        <div className="col-12 col-lg-8">
                            <div className="section-heading">
                                <h6>Popular News</h6>
                            </div>

                            <div className="row">

                                
                                <div className="col-12 col-md-6">
                                    <div className="single-blog-post style-3">
                                        <div className="post-thumb">
                                            <a href="#"><img src="img/bg-img/12.jpg" alt=""/></a>
                                        </div>
                                        <div className="post-data">
                                            <a href="#" className="post-catagory">Finance</a>
                                            <a href="#" className="post-title">
                                                <h6>Dolor sit amet, consectetur adipiscing elit. Nam eu metus sit amet odio sodales placer. Sed varius leo ac...</h6>
                                            </a>
                                            <div className="post-meta d-flex align-items-center">
                                                <a href="#" className="post-like"><img src="img/core-img/like.png" alt=""/> <span>392</span></a>
                                                <a href="#" className="post-comment"><img src="img/core-img/chat.png" alt=""/> <span>10</span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                
                                <div className="col-12 col-md-6">
                                    <div className="single-blog-post style-3">
                                        <div className="post-thumb">
                                            <a href="#"><img src="img/bg-img/13.jpg" alt=""/></a>
                                        </div>
                                        <div className="post-data">
                                            <a href="#" className="post-catagory">Finance</a>
                                            <a href="#" className="post-title">
                                                <h6>Dolor sit amet, consectetur adipiscing elit. Nam eu metus sit amet odio sodales placer. Sed varius leo ac...</h6>
                                            </a>
                                            <div className="post-meta d-flex align-items-center">
                                                <a href="#" className="post-like"><img src="img/core-img/like.png" alt=""/> <span>392</span></a>
                                                <a href="#" className="post-comment"><img src="img/core-img/chat.png" alt=""/> <span>10</span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                
                                <div className="col-12 col-md-6">
                                    <div className="single-blog-post style-3">
                                        <div className="post-thumb">
                                            <a href="#"><img src="img/bg-img/14.jpg" alt=""/></a>
                                        </div>
                                        <div className="post-data">
                                            <a href="#" className="post-catagory">Finance</a>
                                            <a href="#" className="post-title">
                                                <h6>Dolor sit amet, consectetur adipiscing elit. Nam eu metus sit amet odio sodales placer. Sed varius leo ac...</h6>
                                            </a>
                                            <div className="post-meta d-flex align-items-center">
                                                <a href="#" className="post-like"><img src="img/core-img/like.png" alt=""/> <span>392</span></a>
                                                <a href="#" className="post-comment"><img src="img/core-img/chat.png" alt=""/> <span>10</span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                
                                <div className="col-12 col-md-6">
                                    <div className="single-blog-post style-3">
                                        <div className="post-thumb">
                                            <a href="#"><img src="img/bg-img/15.jpg" alt=""/></a>
                                        </div>
                                        <div className="post-data">
                                            <a href="#" className="post-catagory">Finance</a>
                                            <a href="#" className="post-title">
                                                <h6>Dolor sit amet, consectetur adipiscing elit. Nam eu metus sit amet odio sodales placer. Sed varius leo ac...</h6>
                                            </a>
                                            <div className="post-meta d-flex align-items-center">
                                                <a href="#" className="post-like"><img src="img/core-img/like.png" alt=""/> <span>392</span></a>
                                                <a href="#" className="post-comment"><img src="img/core-img/chat.png" alt=""/> <span>10</span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div className="col-12 col-lg-4">
                            <div className="section-heading">
                                <h6>Info</h6>
                            </div>
                            
                            <div className="popular-news-widget mb-30">
                                <h3>4 Most Popular News</h3>

                             
                                <div className="single-popular-post">
                                    <a href="#">
                                        <h6><span>1.</span> Amet, consectetur adipiscing elit. Nam eu metus sit amet odio sodales.</h6>
                                    </a>
                                    <p>April 14, 2018</p>
                                </div>

                               
                                <div className="single-popular-post">
                                    <a href="#">
                                        <h6><span>2.</span> Consectetur adipiscing elit. Nam eu metus sit amet odio sodales placer.</h6>
                                    </a>
                                    <p>April 14, 2018</p>
                                </div>

                             
                                <div className="single-popular-post">
                                    <a href="#">
                                        <h6><span>3.</span> Adipiscing elit. Nam eu metus sit amet odio sodales placer. Sed varius leo.</h6>
                                    </a>
                                    <p>April 14, 2018</p>
                                </div>

                               
                                <div className="single-popular-post">
                                    <a href="#">
                                        <h6><span>4.</span> Eu metus sit amet odio sodales placer. Sed varius leo ac...</h6>
                                    </a>
                                    <p>April 14, 2018</p>
                                </div>
                            </div>

                            
                            <div className="newsletter-widget">
                                <h4>Newsletter</h4>
                                <p>Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                                <form action="#" method="post">
                                    <input type="text" name="text" placeholder="Name"/>
                                    <input type="email" name="email" placeholder="Email"/>
                                    <button type="submit" className="btn w-100">Subscribe</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        );
    }
}
    
    