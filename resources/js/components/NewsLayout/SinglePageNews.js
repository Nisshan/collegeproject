import React from "react";

import { Header } from "./Header";
import { Footer } from './Footer';
import { SingleBlogPost } from '../NewsPostComponents/SingleBlogPost';
import { PostAuthorDetails} from '../NewsContentArea/PostAuthorDetails';
//import { EditorsPickPostArea } from './EditorsPickPostArea';
//import { FeaturedPostArea } from './FeaturedPostArea';
//import { PopularNewsArea } from './PopularNewsArea';
import { PostConsumer } from '../context';

export class SinglePageNews extends React.Component {

    constructor(props) {
        super(props);
        //const { cateUrl } = this.props;
        //console.log(this.props)
        this.state = {
            posts: [],
            images: [],
            urlCatePosts: '/api/postBySlug/'+this.props.newsSlug,
            urlImages: '/api/postImage/'+this.props.newsSlug,
        };
    }
    
    async getCategoryPosts(){
        try{
            const postdata = await fetch(this.state.urlCatePosts);
            //console.log(data);
            const catePostsData = await postdata.json();
            this.setState({
                posts: catePostsData,
            });
        }catch(error){
            console.log(error);
        }
    }
    
    async getPostImage(){
        try{
            const imageData = await fetch(this.state.urlImages);
            //console.log(data);
            const postImageData = await imageData.json();
            this.setState({
                images: postImageData
            });
        }catch(error){
            console.log(error);
        }
    }
   
    componentDidMount() {
        //Doesnot Update by navbar
        //console.log('component Did Mount')
        this.getCategoryPosts(); 
        this.getPostImage();   
    }
    render() {
        
    //console.log(this.state.catePosts);
    //const { post, isLoaded } = this.state;
    //console.log(this.state.catePosts);
        return(
            <div className="blog-area section-padding-0-80">
                <div className="container" >
                    <div className="row">
                        <div className="col-12 col-lg-8">
                            <div className="blog-posts-area">
                                <div className="single-blog-post featured-post single-post">
                                    {this.state.images.map(image =>{
                                        return(
                                            <div className="post-thumb" key= {image.id}> 
                                                <a href="#">
                                                    <img src={image.image} alt="pic" className=""/>
                                                </a>
                                            </div>
                                        )
                                    })}
                                    {this.state.posts.map(post =>{
                                    return(
                                        <div className="post-data" key={post.id}>
                                            <a href="#" className="post-title">
                                                <h6>{post.title}</h6>
                                            </a>
                                            <div className="post-meta">
                                                <p className="post-excerp" dangerouslySetInnerHTML={{ __html: post.description }}></p>
                                                <div className="newspaper-post-like d-flex align-items-center justify-content-between">
                                                    <div className="newspaper-tags d-flex">
                                                        <span>Tags:</span>
                                                        <ul className="d-flex">
                                                            <li><a href="#">{post.keywords}</a></li>
                                                        </ul>
                                                    </div>
                                                    <div className="d-flex align-items-center post-like--comments">
                                                        <a href="#" className="post-like"><img src="/img/core-img/like.png" alt=""/> <span>392</span></a>
                                                        <a href="#" className="post-comment"><img src="/img/core-img/chat.png" alt=""/> <span>10</span></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <PostAuthorDetails userId={post.user_id}/>
                                        </div> 
                                        )
                                    })}    
                                </div>        
                                
                            <div className="pager d-flex align-items-center justify-content-between">
                                <div className="prev">
                                    <a href="#" className="active"><i className="fa fa-angle-left"></i> previous</a>
                                </div>
                                <div className="next">
                                    <a href="#">Next <i className="fa fa-angle-right"></i></a>
                                </div>
                            </div>

                            <div className="section-heading">
                                <h6>Related</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        );
    }
}