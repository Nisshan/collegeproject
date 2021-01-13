import React, { Component } from 'react';
import { Link } from "react-router-dom";

export class SingleBlogPost extends React.Component{
    
    render() {
        const { posts } = this.props;
        return (  
            <div className="blog-area section-padding-0-80">
                <div className="container">
                    <div className="row">
                        <div className="col-12 col-lg-12">
                            <div className="blog-posts-area">
                                {posts.map(post =>
                                    <div className="single-blog-post featured-post single-post" key={post.id}>              
                                        <div className="post-thumb">
                                            <a href="#"><img src={post.image} alt="" /></a>
                                        </div>
                                        <div className="post-data">
                                            <a href="#" className="post-title">
                                                <h6>{post.title}</h6>
                                            </a>
                                            <a href="#" className="post-catagory">Finance</a>           
                                        </div>
                                    </div>
                                )}
                            </div>
                        </div>
                    </div>  
                </div>
            </div> 
        );
    }
}

export default SingleBlogPost;