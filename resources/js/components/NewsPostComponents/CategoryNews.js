import React, { Component ,Fragment} from 'react';
import { NewsPosts } from './NewsPosts';
import { NewsByCategory } from '../NewsPostComponents/NewsByCategory';
import { MainPostArea } from '../NewsContentArea/MainPostArea';
import { Link } from "react-router-dom";

export class CategoryNews extends React.Component {
    
    constructor(props) {
        super(props);
        const { cateUrl } = this.props;
        //console.log(this.props)
        this.state = {
            catePosts: [],
            urlCatePosts: 'api/postByCategoryName/'+cateUrl+'',
            cateByParentId: [],
            urlcateByParentId: 'api/postByCategoryName/'+cateUrl+'',
        };
    }
    
    async getCategoryPosts(){
        try{
            const data = await fetch(this.state.urlCatePosts);
            const catePostsData = await data.json();
            this.setState({
                catePosts: catePostsData
            });
        }catch(error){
            console.log(error);
        }
    }

    async getChildCategoryPosts(){
        try{
            const data = await fetch(this.state.urlcateByParentId);
            const childCategoryData = await data.json();
            this.setState({
                cateByParentId: childCategoryData
            });
        }catch(error){
            console.log(error);
        }
    }
 
    async componentWillReceiveProps(nextProps){
        //Change by clicking navabar
        try{
            const data = await fetch('api/postByCategoryName/'+nextProps.cateUrl);
            const catePostsData = await data.json();
            const data2 = await fetch('api/postByCategoryName/'+nextProps.cateUrl);
            const childCateData = await data2.json();
            
            this.setState({
                catePosts: catePostsData,
                cateByParentId: childCateData
            });
        
        }catch(error){
            console.log(error);
        }
    }
    
    componentDidMount() {
        //It Change only once by navbar
        this.getCategoryPosts();   
        this.getChildCategoryPosts();
    }
    
    render() {
        
        const { cateUrl } = this.props;
        return (
            <Fragment>
                <MainPostArea/>
                <div className="blog-area section-padding-0-80">
                    <div className="container">
                        <hr/>
                        <nav aria-label="breadcrumb">
                            <ol className="breadcrumb">
                                <li className="breadcrumb-item"><Link to="/">Home</Link></li>
                                <li className="breadcrumb-item active" aria-current="page">{cateUrl}</li>
                            </ol>
                        </nav>
                        {/*
                            <div className="row">
                                <div className="col-12 col-lg-12">
                                    <div className="blog-posts-area">
                                        {this.state.cateByParentId.map(childCategory =>{
                                            return <NewsByCategory key={childCategory.id} childCategoryId = {childCategory.id} childCategoryTitle = {childCategory.name}/>
                                        })}
                                    </div>
                                </div>
                            </div>
                        */}
                        <hr/>
                    </div>
                    
                    <div className="container">
                        <div className="row">
                            <div className="col-12 col-lg-10">
                                <div className="blog-posts-area">
                                    {this.state.catePosts.map(catePost =>{
                                        //console.log(catePost.id);
                                        return <NewsPosts key={catePost.id} catePost = {catePost} cateUrl = {cateUrl}/>
                                    })}  
                                </div>
                            </div>
                        {/*
                            <div className="col-12 col-lg-2">
                                <div className="blog-sidebar-area">
                                    <div className="latest-posts-widget mb-50">   
                                        <PostConsumer>
                                            {value => { 
                                                return value.categories.map(category => {
                                                    if(category.parent_id == 0 && !(category.id == cateUrl))
                                                    return <LatestPostByCategoryWidget key={category.id} categoryId = {category.id} categoryTitle = {category.name}/>
                                                });
                                            }}
                                        </PostConsumer>
                                    </div>
                                    <div className="popular-news-widget mb-50">
                                        <h3>4 Most Popular News</h3>
                                        <div className="single-popular-post">
                                            <a href="#">
                                                <h6><span>1.</span> Amet, consectetur adipiscing elit. Nam eu metus sit amet odio sodales.</h6>
                                            </a>
                                            <p>April 14, 2018</p>
                                        </div>        
                                        <div className="single-popular-post">
                                            <a href="#">
                                                <h6><span>2.</span> Consectetur adipiscing elit. Nam eu metus sit amet odio sodales placer.</h6>
                                            </a>
                                            <p>April 14, 2018</p>
                                        </div>   
                                        <div className="single-popular-post">
                                            <a href="#">
                                                <h6><span>3.</span> Adipiscing elit. Nam eu metus sit amet odio sodales placer. Sed varius leo.</h6>
                                            </a>
                                            <p>April 14, 2018</p>
                                        </div>    
                                        <div className="single-popular-post">
                                            <a href="#">
                                                <h6><span>4.</span> Eu metus sit amet odio sodales placer. Sed varius leo ac...</h6>
                                            </a>
                                            
                                            <p>April 14, 2018</p>
                                        </div>
                                    </div>
                                    <div className="newsletter-widget mb-50">
                                        <h4>Newsletter</h4>
                                        <p>Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                                        <form action="#" method="post">
                                            <input type="text" name="text" placeholder="Name"/>
                                            <input type="email" name="email" placeholder="Email"/>
                                            <button type="submit" className="btn w-100">Subscribe</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        */}
                        </div>
                    </div> 
                </div>
            </Fragment>
        );
    }
}

