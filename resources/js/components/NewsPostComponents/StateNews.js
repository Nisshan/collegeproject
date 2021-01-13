import React, { Component ,Fragment} from 'react';
import { Route, Link } from "react-router-dom";
import SingleBlogPost from './SingleBlogPost';
import { SinglePageNews } from '../NewsLayout/SinglePageNews';
import { DistrictNews } from './DistrictNews';
import { MainPostArea } from '../NewsContentArea/MainPostArea';
import { PostProvider } from '../context';

export class StateNews extends React.Component{
    //This Props is State Name passedfrom url
    constructor(props) {
        super(props);
        const { stateName } = this.props;
        //const { cateUrl } = this.props;
        //console.log(this.props)
        this.state = {
            states: [],
            isStateLoaded: false,
            //districtNews:<DistrictNews stateId={states.id}/>,
            urlStates: '/api/stateByName/'+stateName,
        };
    }
    
    async getCategoryPosts(){
        //console.log("I am From StateNews Category Posts");
        try{
            const data = await fetch(this.state.urlStates);
            //console.log(data);
            const catePostsData = await data.json();
            console.log(catePostsData);
            this.setState({
                states: catePostsData,
                isStateLoaded: true
                //districtNews:<DistrictNews stateId={catePostsData.id}/>
            });
        }catch(error){
            console.log(error);
        }
    }

    componentDidMount() {
        this.getCategoryPosts();   
    }
    async componentWillReceiveProps(nextProps){
        //Change by clicking navabar
        //console.log("I am From State Component Will Recevie Props");

        try{
            const data = await fetch('/api/stateByName/'+nextProps.stateName);
            const catePostsData = await data.json();
            console.log(catePostsData);
            this.setState({
                states: catePostsData,
            });
        
        }catch(error){
            console.log(error);
        }
    }

    render() {
        //const { id, title, description, slug, created_at ,user_id} = this.props.catePost;
        const{ states } = this.state; 
        //const{ stateId } = this.state.states.id;
        //console.log(states.id);
        return (
            <Fragment>
                <MainPostArea/>
                <div className="blog-area section-padding-0-80">
                    <div className="container">
                        {this.state.states.map(province =>{
                            return <DistrictNews key={province.id} stateId={province.id} states = {province} />   
                        })} 
                    </div>
                </div>
            </Fragment>                    
        );
    }
}