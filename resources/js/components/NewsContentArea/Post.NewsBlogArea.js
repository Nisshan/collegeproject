import React, { Component } from 'react';

import { NewsBlogSideBar } from "../NewsPostComponents/NewsBlogSideBar";
import { SingleBlogPost } from '../NewsPostComponents/SingleBlogPost';

export class NewsBlogArea extends React.Component {
    render() {
        return (
            <div class="blog-area section-padding-0-80">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-lg-8">
                            <div class="blog-posts-area">
                                <div className="blog-area section-padding-0-80">
                                    <div className="container">
                                        <div className="row">
                                            <div className="col-12 col-lg-8">
                                                <div className="blog-posts-area">

                                                    <SingleBlogPost />

                                                </div>
                                            </div>

                                            <NewsBlogSideBar/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        );
    }
}

export default NewsBlogArea;