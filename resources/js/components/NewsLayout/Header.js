import React from "react";
import { Navbar } from "./Header.Nav";
import { TopHeaderArea } from "./Header.TopArea";
import { PostConsumer } from '../context';

export class Header extends React.Component{
    render() {
        //const { categories } = this.props;
        //console.log('Hello World')
        //console.log(categories)
        return(
            <header className="header-area">
            <div id="top-pages">
                <div className="container-fluid d-flex justify-content-between">
                    <div className="pages-link">
                        <a href="#">Announcement</a>
                        <a href="#" className="hidden-xs">Report</a>
                        <a href="#" className="hidden-xs">AGM</a>
                        <a href="#" className="hidden-xs">Dividend</a>
                        <a href="#" className="hidden-xs">Right</a>
                        <a href="#" className="hidden-xs">Promoted Content</a>
                        <a href="#" className="hidden-xs">Vacancy</a>
                        <a href="#">IPO Result</a>
                    </div>
                    <div className="social-icons">
                        <a href="#"><i className="fa fa-facebook"></i></a>
                        <a href="#"><i className="fa fa-youtube"></i></a>
                        <a href="#"><i className="fa fa-twitter"></i></a>
                    </div>
                </div>
            </div>
                <TopHeaderArea/>
                
                    <PostConsumer>
                        {value => { 
                            console.log(value.categories);
                            //return value.categories.map(category => {
                              return <Navbar categories = {value.categories}/>
                            //});
                        }}  
                    </PostConsumer>
            </header>
        
        );
    }
}