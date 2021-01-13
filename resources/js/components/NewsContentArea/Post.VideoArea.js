import React from "react";

export class Header extends React.Component{
    render() {
        return(
            <div className="video-post-area bg-img bg-overlay" style="background-image: url(img/bg-img/bg1.jpg);">
                <div className="container">
                    <div className="row justify-content-center">
                        
                        <div className="col-12 col-sm-6 col-md-4">
                            <div className="single-video-post">
                                <img src="img/bg-img/video1.jpg" alt=""/>
                                
                                <div className="videobtn">
                                    <a href="https://www.youtube.com/watch?v=5BQr-j3BBzU" className="videoPlayer"><i className="fa fa-play" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>

                        
                        <div className="col-12 col-sm-6 col-md-4">
                            <div className="single-video-post">
                                <img src="img/bg-img/video2.jpg" alt=""/>
                            
                                <div className="videobtn">
                                    <a href="https://www.youtube.com/watch?v=5BQr-j3BBzU" className="videoPlayer"><i className="fa fa-play" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>

                        
                        <div className="col-12 col-sm-6 col-md-4">
                            <div className="single-video-post">
                                <img src="img/bg-img/video3.jpg" alt=""/>
                                
                                <div className="videobtn">
                                    <a href="https://www.youtube.com/watch?v=5BQr-j3BBzU" className="videoPlayer"><i className="fa fa-play" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        );
    }
}

