import React, { Component ,Fragment} from 'react';
import { Link } from "react-router-dom";
import { PostConsumer } from "../context";
//import { BrowserRouter as Router, Route , Switch, HashRouter} from "react-router-dom";

export class Navbar extends React.Component {
   
    constructor() {
        super();
        this.state = {
            districts: [],
            urlDistricts: 'api/districts',
            isDistrictLoaded:false,
            states: [],
            urlState: "api/states",
            isStateLoaded: false,
        };
    }
    
    async getDistricts(){
        try{
            const data = await fetch(this.state.urlDistricts);
            const DistrictsData = await data.json();
            this.setState({
                districts: DistrictsData,
                isLoaded:true
            });
        }catch(error){
            console.log(error);
        }
    }

    async getStates(){
        try{
            const data = await fetch(this.state.urlState);
            const DistrictsData = await data.json();
            this.setState({
                districts: DistrictsData,
                isLoaded:true
            });
        }catch(error){
            console.log(error);
        }
    }

    componentDidMount() {
        this.getDistricts();   
    }
    render() {
        
        const { categories } = this.props;
        const { districts, isLoaded } = this.state;
        //console.log(categories);
        return (
            <Fragment>
                <div className="newspaper-main-menu" id="stickyMenu">
                    <div className="classy-nav-container breakpoint-off">
                        <div className="container">
                            <nav className="classy-navbar justify-content-between" id="newspaperNav">
                                <div className="classy-navbar-toggler">
                                    <span className="navbarToggler"><span></span><span></span><span></span></span>
                                </div>
                                <div className="classy-menu">
                                    <div className="classycloseIcon">
                                        <div className="cross-wrap"><span className="top"></span><span className="bottom"></span></div>
                                    </div>
                                    <div className="classynav">
                                        <ul>
                                            <li className="active"><Link to="/">Home</Link></li>
                                            <li><a href="#">Pages</a>
                                                <ul className="dropdown">
                                                    <li><Link to="/">Home</Link></li>
                                                    <li><a href="catagories-post.html">Catagories</a></li>
                                                    <li><a href="single-post.html">Single Articles</a></li>
                                                    <li><a href="about.html">About Us</a></li>
                                                    <li><a href="contact.html">Contact</a></li>
                                                    <li><a href="#">Dropdown</a>
                                                        <ul className="dropdown">
                                                            <li><a href="index.html">Home</a></li>
                                                            <li><a href="catagories-post.html">Catagories</a></li>
                                                            <li><a href="single-post.html">Single Articles</a></li>
                                                            <li><a href="about.html">About Us</a></li>
                                                            <li><a href="contact.html">Contact</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li><a href="#">States</a>
                                                <div className="megamenu">                           
                                                    <PostConsumer>
                                                        {value => { 
                                                           
                                                            return value.states.map(state => {
                                                                return(
                                                                    <ul className="single-mega cn-col-5" key={state.id}>
                                                                        <li className="title" key={state.slug}>  
                                                                            <h6>{state.name}</h6>
                                                                                {districts.map(district =>
                                                                                    (( (district.state_id) == (state.id) ) ? <Link to={"/district/"+district.slug} key= {district.id} >{district.name} </Link> : null)
                                                                                )
                                                                            }
                                                                        </li>
                                                                    </ul>  
                                                                   
                                                                )
                                                            });     
                                                        }}
                                                    </PostConsumer>
                                                </div>
                                            </li>
                                            
                                            {categories.map(category =>
                                                <li className="cn-dropdown-item has-down" key={category.id}>
                                                    {category.parent_id == 0 ? 
                                                        <Link to={"/"+category.slug}>
                                                            {category.name}
                                                        </Link>       
                                                    : null}   
                                                    <ul className="dropdown" >
                                                        {categories.map(category1 =>
                                                            <li key={category1.id}>
                                                                {(category1.parent_id) == (category.id) ? <Link to={"/"+category1.slug}>{category1.name} </Link> : null}
                                                            </li>
                                                        )}
                                                    </ul>
                                                </li>
                                            )}
                                        </ul>
                                    </div>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
                <br/>
            </Fragment>
        );
    }
}

