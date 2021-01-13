import React, { Component, Fragment } from 'react';
import {LatestStateNewsWidget} from './LatestStateNewsWidget';

export class MainNews extends React.Component {
    render() {
        return (
            <Fragment>
                <div className="featured-post-area">
                    <div className="container">
                        <div className="row">
                            <div className="col-12 col-md-6 col-lg-8">
                                <div className="row">
                                    <div className="col-12 col-lg-7">
                                        <div className="single-blog-post featured-post">
                                            <div className="post-thumb">
                                                <a href="#"><img src="/img/bg-img/17.jpg" alt=""/></a>
                                            </div>
                                            <div className="post-data">
                                                <a href="#" className="post-title">
                                                    <h6>Financial news: A new company is born today at the stock market</h6>
                                                </a>
                                                <div className="post-meta">
                                                    <p className="post-author">By <a href="#">Christinne Williams</a></p>
                                                    <p className="post-excerp">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu metus sit amet odio sodales placerat. Sed varius leo ac leo fermentum, eu cursus nunc maximus. Integer convallis nisi nibh, et ornare neque ullamcorper ac. Nam id congue lectus, a venenatis massa. Maecenas justo libero, vulputate vel nunc id, blandit feugiat sem. </p>
                                                    
                                                    <div className="d-flex align-items-center">
                                                        <a href="#" className="post-like"><img src="img/core-img/like.png" alt=""/> <span>392</span></a>
                                                        <a href="#" className="post-comment"><img src="img/core-img/chat.png" alt=""/> <span>10</span></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div className="col-12 col-lg-5">
                                        <div className="single-blog-post featured-post-2">
                                            <div className="post-thumb">
                                                <a href="#"><img src="/img/bg-img/18.jpg" alt=""/></a>
                                            </div>
                                            <div className="post-data">
                                                <a href="#" className="post-title">
                                                    <h6>Financial news: A new company is born today at the stock market</h6>
                                                </a>
                                            </div>
                                        </div>
                                        <div className="single-blog-post featured-post-2">
                                            <div className="post-thumb">
                                                <a href="#"><img src="img/bg-img/18.jpg" alt=""/></a>
                                            </div>
                                            <div className="post-data">
                                                <a href="#" className="post-catagory">Finance</a>
                                                <div className="post-meta">
                                                    <a href="#" className="post-title">
                                                        <h6>Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                                                            Nam eu metus sit amet odio sodales placerat. Sed varius leo ac...</h6>
                                                    </a>
                                                    
                                                    <div className="d-flex align-items-center">
                                                        <a href="#" className="post-like"><img src="img/core-img/like.png" alt=""/> <span>392</span></a>
                                                        <a href="#" className="post-comment"><img src="img/core-img/chat.png" alt=""/> <span>10</span></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <LatestStateNewsWidget/>
                        </div>
                    </div>
                </div>   
            </Fragment>
        );
    }
}
