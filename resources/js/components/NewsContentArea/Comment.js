import React, { Component, Fragment } from 'react';

export class Comment extends Component {
    render() {
        return (
            <Fragment>
                <div className="comment_area clearfix">
                    <h5 className="title">3 Comments</h5>
                    <ol>  
                        <li className="single_comment_area"> 
                            <div className="comment-content d-flex">
                                    Comment Author 
                                <div className="comment-author">
                                    <img src="img/bg-img/30.jpg" alt="author"/>
                                </div>
                                
                                <div className="comment-meta">
                                    <a href="#" className="post-author">Christian Williams</a>
                                    <a href="#" className="post-date">April 15, 2018</a>
                                    <p>Donec turpis erat, scelerisque id euismod sit amet, fermentum vel dolor. Nulla facilisi. Sed pellen tesque lectus et accu msan aliquam. Fusce lobortis cursus quam, id mattis sapien.</p>
                                </div>
                            </div>
                            <ol className="children">
                                <li className="single_comment_area">         
                                    <div className="comment-content d-flex">        
                                        <div className="comment-author">
                                            <img src="img/bg-img/31.jpg" alt="author"/>
                                        </div> 
                                        <div className="comment-meta">
                                            <a href="#" className="post-author">Sandy Doe</a>
                                            <a href="#" className="post-date">April 15, 2018</a>
                                            <p>Donec turpis erat, scelerisque id euismod sit amet, fermentum vel dolor. Nulla facilisi. Sed pellen tesque lectus et accu msan aliquam. Fusce lobortis cursus quam, id mattis sapien.</p>
                                        </div>
                                    </div>
                                </li>
                            </ol>
                        </li>

                        <li className="single_comment_area">     
                            <div className="comment-content d-flex">
                                <div className="comment-author">
                                    <img src="img/bg-img/32.jpg" alt="author"/>
                                </div>
                                <div className="comment-meta">
                                    <a href="#" className="post-author">Christian Williams</a>
                                    <a href="#" className="post-date">April 15, 2018</a>
                                    <p>Donec turpis erat, scelerisque id euismod sit amet, fermentum vel dolor. Nulla facilisi. Sed pellen tesque lectus et accu msan aliquam. Fusce lobortis cursus quam, id mattis sapien.</p>
                                </div>
                            </div>
                        </li>
                    </ol>
                </div>
            
                <div class="post-a-comment-area section-padding-80-0">
                    <h4>Leave a comment</h4>
                    
                    <div class="contact-form-area">
                        <form action="#" method="post">
                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <input type="text" class="form-control" id="name" placeholder="Name*"/>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <input type="email" class="form-control" id="email" placeholder="Email*"/>
                                </div>
                                <div class="col-12">
                                    <input type="text" class="form-control" id="subject" placeholder="Website"/>
                                </div>
                                <div class="col-12">
                                    <textarea name="message" class="form-control" id="message" cols="30" rows="10" placeholder="Message"></textarea>
                                </div>
                                <div class="col-12 text-center">
                                    <button class="btn newspaper-btn mt-30 w-100" type="submit">Submit Comment</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </Fragment>
        );
    }
}
