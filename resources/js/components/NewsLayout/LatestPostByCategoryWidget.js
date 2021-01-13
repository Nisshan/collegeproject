import React, { Component ,Fragment} from 'react';
import { Link } from "react-router-dom";

export class LatestPostByCategoryWidget extends React.Component{
    
    constructor(props) {
        super(props);
        const { categoryId } = this.props;
        //console.log(categoryId);
        this.state = {
            latestPosts: [],
            isPostLoaded: false,
            urlLatestPost: 'api/latestpost/'+categoryId+''
        };
    }
    async getLatestPost(){
        //console.log("I am Latest Post")
        try{
            const data = await fetch(this.state.urlLatestPost);
            const lateData = await data.json();
            this.setState({
                latestPosts: lateData,
                isPostLoaded: true
            });
        }catch(error){
            console.log(error);
        }
    }
    componentDidMount() {
       // console.log('component Did Mount')
        this.getLatestPost();   
    }
    render() {
        const { categoryTitle } = this.props;
        //console.log(this.props.categoryTitle);
        const { latestPosts,isPostLoaded } = this.state;
        const DATE_OPTIONS = { year: 'numeric', month: 'short', day: '2-digit' };
        //console.log(latestPosts);
        if(!isPostLoaded){
            //console.log("I am Inside");
            return <img src="/img/bg-img/loading.gif" alt=""/>
        } 
        else{  
            return (
                <Fragment>
                    {latestPosts.map(post =>{
                        var title = post.title;
                        return(
                            <div className="single-blog-post small-featured-post d-flex" key={post.id}>
                                <div className="post-thumb">
                                    <a href="#"><img src="/img/bg-img/19.jpg" alt=""/></a>
                                </div>
                                <div className="post-data">
                                    <a href="#" className="post-catagory"> {categoryTitle} </a>
                                        <div className="post-meta" >
                                            <Link to={"/news/"+post.slug}>
                                                <h6 dangerouslySetInnerHTML={{ __html: title.substr(0, 30)}} />
                                            </Link>
                                        <p className="post-date"><span>
                                            {(new Date(post.created_at)).toLocaleDateString('en-us', DATE_OPTIONS) }</span> 
                                        </p>
                                    </div>
                                </div>
                            </div>
                        )
                    })}
                </Fragment>              
            );
        }
    }
}
