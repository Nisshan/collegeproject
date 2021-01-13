import React, { Component } from 'react';

const PostContext = React.createContext();
//If you only want to avoid passing some props 
//through many levels. Context is designed to share 
//data that can be considered “global” for a tree of 
//React components, such as the current authenticated user, theme, or preferred language.”

class PostProvider extends Component {

    constructor() {   
    super();
        this.state = {
            categories: [],
            urlCategory: "api/category",
            isCategoryLoaded:false,
            posts: [],
            urlPost: "api/posts",
            isPostLoaded: false,
            states: [],
            urlState: "api/states",
            isStateLoaded: false
        };
    }
    async getPost(){
       // console.log("I am Get Post")
        try{
            const data = await fetch(this.state.urlPost);
            const postData = await data.json();
            this.setState({
                posts: postData,
                isPostLoaded:true
            });
        }catch(error){
            console.log(error);
        }
    }

    async getCategory(){
        //console.log("I am Get Category")
        try{
            const data = await fetch(this.state.urlCategory);
            const cateData = await data.json();
            this.setState({
                categories: cateData,
                isCategoryLoaded:true,
            });
        }catch(error){
            console.log(error);
        }
    }

    async getState(){
       // console.log("I am Get State")
        try{
            const data = await fetch(this.state.urlState);
            const stateData = await data.json();
            this.setState({
                states: stateData,
                isStateLoaded:true
            });
        }catch(error){
            console.log(error);
        }
    }
    componentDidMount() {
        this.getCategory();  
        //this.getPost();   
        this.getState();
        //this.getSlug(); 
    }

    render() {
        const { isStateLoaded,isCategoryLoaded, isPostLoaded} = this.state;
        
            console.log(isStateLoaded);
            console.log(isCategoryLoaded);
            console.log(isPostLoaded);
            //console.log(this.state);
            return (
                //console.log('I am inside postContext'),
                
                <PostContext.Provider value={{  
                     
                    ...this.state,//all of State
                }}>
                    {this.props.children}
                </PostContext.Provider>
            );
    }
}
//if((isStateLoaded && isCategoryLoaded && isPostLoaded) == true)
//console.log('Hello from below');
const PostConsumer = PostContext.Consumer;

export { PostProvider, PostConsumer} ;
