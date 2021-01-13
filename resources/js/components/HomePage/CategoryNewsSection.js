import React, { Component, Fragment } from 'react';
import { Link } from "react-router-dom";

export class CategoryNewsSection extends React.Component {

    constructor(props) {
        super(props);
        const { categoryId } = this.props;
        this.state = {
            categories: [],
            urlCategories: 'api/childCategory/'+categoryId,     
            pinnedPosts: [],
            urlpinnedPosts: 'api/pinnedPosts/'+categoryId,
            cateMainNews: [],
            urlCateMainNews: 'api/mainNewsByCategory/'+categoryId,
            isLoaded:false,
        };
    }
    
    async getCategory(){
        try{
            const data = await fetch(this.state.urlCategories);
            const CategoriesData = await data.json();
            this.setState({
                categories: CategoriesData,
                isLoaded:true
            });
        }catch(error){
            console.log(error);
        }
    }
    async getPinnedPosts(){
        try{
            const data = await fetch(this.state.urlpinnedPosts);
            const PostsData = await data.json();
            this.setState({
                pinnedPosts: PostsData,
                isLoaded:true
            });
        }catch(error){
            console.log(error);
        }
    }
    async getCateMainNews(){
        try{
            const data = await fetch(this.state.urlCateMainNews);
            const PostsData = await data.json();
            this.setState({
                cateMainNews: PostsData,
                isLoaded:true
            });
        }catch(error){
            console.log(error);
        }
    }

    componentDidMount() {
        this.getCategory(); 
        this.getPinnedPosts();  
        this.getCateMainNews();
    }

    render() {
        const{ categoryName, categorySlug } = this.props;
        //const { isLoaded } = this.state;\
        console.log(categorySlug);
        return (
            <Fragment>
                <div className="popular-news-area section-padding-80-50 margin-auto">
                    <div className="container-fluid">
                        <div className="row">
                            <div className="col-lg-8">
                                <div className="card panel-primary">
                                    <div className="card-header d-flex justify-content-between">
                                        <div className="main-heading">
                                            <Link to={"/"+categorySlug}>{categoryName}</Link>
                                        </div>
                                        <div className="left-links">
                                            {this.state.categories.map(category =>
                                                <Link to={"/"+category.slug} key={category.id}>{category.name}</Link>
                                            )}               
                                        </div>
                                        <div className="view-all">
                                            <a href="#" className="btn btn-custom">View all</a>
                                        </div>
                                    </div>
                                    <div className="card-body row">
                                        {this.state.cateMainNews.map(news =>
                                            <div className="col-lg-6" key={news.id}>
                                            <div className="img-placeholder">
                                                <img src={news.cover} className="img img-responsive" alt=""/>
                                            </div>
                                            <Link to={"/news/"+news.slug} className="main-news-heading">
                                                <h2>{news.title}</h2>
                                            </Link>
                                        </div> 
                                        )}
                                        <div className="col-lg-6">
                                            {this.state.pinnedPosts.map(post =>
                                                <div className="single-blog-post small-featured-post d-flex" key={post.id}>  
                                                    <div className="post-thumb">
                                                        <img src={post.cover} alt="pic"/>
                                                    </div>
                                                    <div className="post-data">
                                                        <Link to={"/news/"+post.slug}><h6>{post.title}</h6></Link>
                                                    </div>
                                                </div>
                                            )}                                
                                        </div>                      
                                    </div>
                                </div>
                            </div>
                            <div className="col-lg-4">
                                <div id='calendar'></div>
                            </div>
                        </div>
                    </div>
                </div>
            </Fragment>
        );
    }
}
