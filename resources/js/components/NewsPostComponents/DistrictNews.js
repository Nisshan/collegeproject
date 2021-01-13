import React, { Component ,Fragment} from 'react';
import { LatestDistrictNews } from '../NewsPostComponents/LatestDistrictNews';

export class DistrictNews extends React.Component {
    // This is To Get District Id...
    constructor(props) {
        super(props);
        const { stateId } = this.props;
        console.log("This is District News")
        console.log(this.props)
        this.state = {
            districts: [],
            urlDistrict: '/api/districtByStateId/'+stateId,
            districtPost: [],
            urlDistrictPost: '/api/DistrictIdInPosts/1',
            isDistrictLoaded: false,
            latestPost: [],
            urlLatestPost: '/api/latestPostByDistrictId/',
            isDistrictPostLoaded: false,
        };
    }
    
    async getDistrict(){
        try{
            const data = await fetch(this.state.urlDistrict);
            //console.log(data);
            const DistrictData = await data.json();
            this.setState({
                districts: DistrictData,
                isDistrictLoaded: true
            });
        }catch(error){
            console.log(error);
        }
    }

    async getDistrictPost(){
        try{
            const data = await fetch(this.state.urlDistrictPost);
            //console.log(data);
            const DistrictData = await data.json();
            //console.log(DistrictData);
            this.setState({
                districtPost: DistrictData,
                isDistrictPostLoaded: true
            });
        }catch(error){
            console.log(error);
        }
    }
 
    componentDidMount() {
        //Doesnot Update by navbar
        //console.log('component Did Mount')
        this.getDistrict();
        this.getDistrictPost();   
    }
    render() {
        //console.log("I am District")
        const { districtPost , isDistrictLoaded,isDistrictPostLoaded } = this.state;
        const{ districts } = this.state;
        //const { districts} = this.state;
        //const items = districtPost.map((item, key) =>
        //<li key={item.id}>{item.split('"')}</li>
    //);
        //console.log(districts);
        
        if(!isDistrictPostLoaded){
            //console.log("I am Inside");
            return <img src="/img/bg-img/loading.gif" alt=""/>
        } 
        else{   
        //console.log(districts);
        return (
            <Fragment>  
                {districts.map(district =>{
                    return (
                        <LatestDistrictNews key= {district.id} districtId = {district.id} districtName={district.name}/>              
                    )
                })}    
            </Fragment>         
            );
        }
    }
}