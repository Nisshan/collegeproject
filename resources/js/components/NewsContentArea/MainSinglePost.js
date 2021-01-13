import React, { Component } from 'react';

export class MainSinglePost extends React.Component {
    render() {
        return (
            <div className="col-12 col-lg-12">
                <div className="single-blog-post featured-post">
                    <div className="post-thumb">
                        <a href="#"><img src="/img/bg-img/27.jpg" alt=""/></a>
                    </div>
                    <div className="post-data">
                        <a href="#" className="post-title">
                            <h4>Financial news: A new company is born today at the stock market</h4>
                        </a>
                    </div>
                </div>
            </div>
        );
    }
}
