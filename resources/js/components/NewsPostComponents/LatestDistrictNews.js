import React, { Component ,Fragment} from 'react';
import { Link } from "react-router-dom";
import { MainPostArea } from '../NewsContentArea/MainPostArea';

export class LatestDistrictNews extends React.Component {
    //This Will Get Post With given District Id
    constructor(props) {
        super(props);
        const { districtId } = this.props;
        //console.log(this.props);
        console.log(this.props)
        this.state = {    
            latestPost: [],
            urlLatestPost: '/api/postByDistrictName/'+districtId,
            isDistrictPostLoaded: false
        };
    }

    async getDistrictPost(){
        try{
            const data = await fetch(this.state.urlLatestPost);
            console.log(data);
            const DistrictData = await data.json();
            //console.log(DistrictData);
            this.setState({
                latestPost: DistrictData,
                isDistrictPostLoaded:true
            });
        }catch(error){
            console.log(error);
        }
    }

    async componentWillReceiveProps(nextProps){
        //Change by clicking navabar
        try{
            const data = await fetch('/api/postByDistrictName/'+nextProps.districtId);
            const DistrictData = await data.json();

            this.setState({
                latestPost: DistrictData,
            });
        
        }catch(error){
            console.log(error);
        }
    }
 
    componentDidMount() {
        //Doesnot Update by navbar
        console.log('I am latest District')
        this.getDistrictPost();   
    }
    render() {
        //console.log("I am District")
        const { latestPost, isDistrictPostLoaded} = this.state;
        //const { id, title, description, slug, created_at ,user_id, image} = this.state;
        const DATE_OPTIONS = { year: 'numeric', month: 'short', day: '2-digit' };
        console.log(this.props);
        
        if(!isDistrictPostLoaded){
            //console.log("I am Inside");
            return <img src="/img/bg-img/loading.gif" alt=""/>
        } 
        else{  
            return (
                <Fragment>
                    <MainPostArea/>   
                    <div className="blog-area section-padding-0-80">
                        <div className="container">
                            <hr/>
                            <nav aria-label="breadcrumb">
                                <ol className="breadcrumb">
                                    <li className="breadcrumb-item"><Link to="/">Home</Link></li>
                                    <li className="breadcrumb-item active" aria-current="page">{this.props.districtId}</li>
                                </ol>
                            </nav>
                            <hr/>
                            <div className="row">
                                <div className="col-12 col-lg-10">
                                    <div className="blog-posts-area">                     
                                        {latestPost.map(post =>{
                                            return(
                                                <div className="single-blog-post featured-post mb-30" key={post.id}>
                                                    <div className="row">
                                                        <div className="col-12 col-lg-4">
                                                            <div className="img-responsive">
                                                                <a href="#"><img src={post.image} alt={post.title}/></a>   
                                                            </div>  
                                                        </div>
                                                        <div className="col-12 col-lg-8">
                                                            <div className="post-title">
                                                                <Link to={"/news/"+post.slug}>
                                                                    <h3>{post.title}</h3>
                                                                </Link>
                                                            </div>
                                                            <div className="post-data">     
                                                                <div className="post-meta">
                                                                    <p className="post-author">By <a href="#">Christinne Williams</a></p>
                                                                    <div className="d-flex align-items-center">
                                                                        <a href="#" className="post-like"><img src="/img/core-img/like.png" alt=""/> <span>392</span></a>
                                                                        <a href="#" className="post-comment"><img src="/img/core-img/chat.png" alt=""/> <span>10</span></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> 
                                            )
                                        })}
                                    </div> 
                                </div>   
                            </div> 
                        </div>
                    </div>  
                </Fragment>
            );
        }
    }   
}