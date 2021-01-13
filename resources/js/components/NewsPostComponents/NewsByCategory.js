import React, { Component, Fragment } from 'react';

export class NewsByCategory extends React.Component {
    
    constructor(props) {
        super(props);
        const { childCategoryId } = this.props;
        this.state = {
            postByCategory: [],
            //districtNews:<DistrictNews stateId={states.id}/>,
            urlStates: '/api/categoryPost/'+childCategoryId,
        };
    }
    
    async getCategoryPosts(){
        //console.log("I am From StateNews Category Posts");
        try{
            const data = await fetch(this.state.urlStates);
            const catePostsData = await data.json();
            console.log(catePostsData);
            this.setState({
                postByCategory: catePostsData,
                //districtNews:<DistrictNews stateId={catePostsData.id}/>
            });
        }catch(error){
            console.log(error);
        }
    }
    
    async componentWillReceiveProps(nextProps){
        //Change by clicking navabar
        try{
            const data = await fetch('/api/categoryPost/'+nextProps.childCategoryId);
            const catePostsData = await data.json();
            this.setState({
                postByCategory: catePostsData
            });
        
        }catch(error){
            console.log(error);
        }
    }

    componentDidMount() {
        this.getCategoryPosts();   
    }

    render() {
        console.log(this.state);
        const DATE_OPTIONS = { year: 'numeric', month: 'short', day: '2-digit' };
        return (
            <div className="col-12 col-md-5 col-lg-12">
                <div className="row">                       
                    {this.state.postByCategory.map(catePost =>{
                        return(
                            <div className="col-12 col-lg-3" key={catePost.id}>
                                <div className="single-blog-post style-2">
                                    <div className="post-thumb">
                                        <a href="#"><img src="/img/bg-img/7.jpg" alt={catePost.title} /></a>
                                    </div>
                                    <div className="post-data">
                                        <a href="#" className="post-title">
                                            <h6>{catePost.title}</h6>
                                        </a>
                                        <div className="post-meta">
                                            <div className="post-date">
                                                <a href="#">{(new Date(catePost.created_at)).toLocaleDateString('en-us', DATE_OPTIONS) }</a></div>
                                        </div>
                                    </div>
                                </div>       
                            </div>
                        )
                    })}
                </div> 
            </div>    
        );
    }
}
