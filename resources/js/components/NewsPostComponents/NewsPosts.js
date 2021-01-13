import React, { Component ,Fragment} from 'react';
import { Route, Link } from "react-router-dom";

export class NewsPosts extends React.Component{

    render() {
        const {  title, slug, image} = this.props.catePost;
        //const{ cateUrl } = this.props;
        //console.log(cateUrl)
        return (
            <Fragment>
                <div className="single-blog-post featured-post mb-30">
                    <div className="row">
                        <div className="col-12 col-lg-4">
                            <div className="img-responsive">
                                <a href="#"><img src="/img/bg-img/15.jpg" alt=""/></a>   
                            </div>  
                        </div>
                        <div className="col-12 col-lg-8">
                            <div className="post-data">
                                <Link to={"/news/"+slug}>
                                    <h3>{title}</h3>
                                </Link>     
                                <div className="post-meta">
                                    <p className="post-author">By <a href="#">Christinne Williams</a></p>
                                    
                                    <div className="d-flex align-items-center">
                                        <a href="#" className="post-like"><img src="/img/core-img/like.png" alt=""/> <span>392</span></a>
                                        <a href="#" className="post-comment"><img src="/img/core-img/chat.png" alt=""/> <span>10</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>         
            </Fragment>                     
        );
    }
}
