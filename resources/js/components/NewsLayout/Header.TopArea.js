import React from "react";

export class TopHeaderArea extends React.Component {
    render() {
        return (
            <div className="top-header-area">
                <div className="container">
                    <div className="row">
                        <div className="col-12">
                            <div className="top-header-content d-flex align-items-center justify-content-between">

                                <div className="logo">
                                    <a href="index.html"><img src="/img/logo.png" alt="logo" /></a>
                                </div>

                                <div className="login-search-area d-flex align-items-center">

                                    <div className="login d-flex">
                                        <a href="#">Login</a>
                                        <a href="#">Register</a>
                                    </div>

                                    <div className="search-form">
                                        <form action="#" method="post">
                                            <input type="search" name="search" className="form-control" placeholder="Search" />
                                            <button type="submit"><i className="fa fa-search" aria-hidden="true"></i></button>
                                        </form>
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
