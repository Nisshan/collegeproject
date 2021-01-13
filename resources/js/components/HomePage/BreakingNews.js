import React, { Fragment }from 'react';
import { Link } from "react-router-dom";

export class BreakingNews extends React.Component {

    constructor() {
        super();
        this.state = {
            breakingNews: [],
            urlBreakingNews: 'api/getBreakingNews/',
            isLoaded:false,
        };
    }
    
    async getBreakingNews(){
        try{
            const data = await fetch(this.state.urlBreakingNews);
            const urlBreakingNewsData = await data.json();
            this.setState({
                breakingNews: urlBreakingNewsData,
                isLoaded:true
            });
        }catch(error){
            console.log(error);
        }
    }

    componentDidMount() {
        this.getBreakingNews();   
    }

    render() {
        return (
            <Fragment>
                {this.state.breakingNews.map(news =>
                    <div key={news.id}>
                        <Link to={"/news/"+news.slug} >
                            <h1 align="center" className="display-4 post-title" >{news.title} </h1>
                        </Link>
                        <br/>
                    </div>
                )}
               
            </Fragment>
        );
    }
}
