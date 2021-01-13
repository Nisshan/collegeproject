import React, { Component, Fragment } from 'react';
import {MainSinglePost} from './MainSinglePost';
import {LatestStateNewsWidget} from '../HomePage/LatestStateNewsWidget';

export class MainPostArea extends React.Component {
    render() {
        return (
            <Fragment>
                <div className="featured-post-area">
                    <div className="container">
                        <div className="row">
                            <div className="col-12 col-md-6 col-lg-8">
                                <div className="row">
                                    <MainSinglePost/>
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
