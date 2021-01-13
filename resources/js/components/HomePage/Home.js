import React, { Component, Fragment } from 'react';
import { EditorsPickPostArea } from './Post.EditorsPickArea';
import { CategoryNewsSection } from './CategoryNewsSection';
import { PopularNewsArea } from './Post.PopularNewsArea';
import { MainNews } from "./MainNews";
import { BreakingNews } from './BreakingNews';
//import SingleBlogPost from "./SingleBlogPost";

export class Home extends React.Component {
  
    constructor() {
        super();
        this.state = {
            categories: [],
            urlCategories: 'api/parentCategory',
           // isDistrictLoaded:false,
        };
    }
    
    async getCategory(){
        try{
            const data = await fetch(this.state.urlCategories);
            const CategoriesData = await data.json();
            this.setState({
                categories: CategoriesData,
                //isLoaded:true
            });
        }catch(error){
            console.log(error);
        }
    }

    componentDidMount() {
        this.getCategory();   
    }

    render() {
        //console.log("hi");
        //console.log(this.state.posts);
       // <SingleBlogPost posts = {this.state.posts}/>
       //<EditorsPickPostArea/>
         
        return(
            <Fragment>       
                <BreakingNews/>

                <MainNews/>

                {this.state.categories.map(category =>
                    <CategoryNewsSection key= {category.id} categoryId = {category.id} categoryName={category.name} categorySlug = {category.slug}/>
                )}
                <PopularNewsArea/>
                    
            </Fragment>
        );
    }
}
