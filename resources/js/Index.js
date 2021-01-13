import React from 'react';
import { render } from "react-dom";
import { BrowserRouter as Router, Route , Switch, HashRouter} from "react-router-dom";
import { Home } from './components/HomePage/Home';
import { Header } from "./components/NewsLayout/Header";
import { SinglePageNews } from './components/NewsLayout/SinglePageNews';
import { StateNews } from './components/NewsPostComponents/StateNews';
//import { CategoryNews } from './components/NewsPostComponents/CategoryNews;
import { NewsBlogArea } from './components/NewsContentArea/Post.NewsBlogArea';
import { Footer } from './components/NewsLayout/Footer';
import { Error } from './components/Error';
import { CategoryNews } from './components/NewsPostComponents/CategoryNews';
import { PostProvider } from './components/context';
import { PostByDistrict } from './components/NewsPostComponents/DistrictNews';
import { LatestDistrictNews } from './components/NewsPostComponents/LatestDistrictNews';

class App extends React.Component { 
    
    render() {
        //const { posts} = this.state.posts
        //console.log('this is index');
        //console.log(this.state.posts);   
        return (
            <PostProvider>
                <Router>
                    <Header/>        
                        <Switch>
                            <Route path = "/" component = {Home} exact/>
                            <Route path = "/news/:slug" component = {getSinglePage} exact/>
                            <Route path = "/province/:state" component = {getStateNews} exact/>
                            <Route path = "/district/:districtId" component = {getDistrictNews} exact/>
                            <Route path = "/NewsBlogArea/" component = {NewsBlogArea}/>
                            <Route path = "/:cate" component = {CatNews} exact/>
                            <Route component = {Error}/>
                        </Switch> 
                    <Footer/>
                </Router> 
            </PostProvider>
        );
    }
}

function CatNews({ match }) {
   // Value are from "/:cate/:id" route
   //console.log('Hello from Ca')
   //console.log("match.params.cate")
    return (
        //console.log('Hello from Ca'), 
        <CategoryNews cateUrl={match.params.cate}/>
    ); 
  }

function getSinglePage({ match }) {
   // console.log({match.params.slug})
    return (
        <SinglePageNews newsSlug = {match.params.slug}/>
    );
}

function getStateNews({ match }) {
    return (
        <StateNews stateName = {match.params.state}/>
            //<h3>ID: {match.params.id}</h3>      
    );
}

function getDistrictNews({ match }) {
    return (
        <LatestDistrictNews districtId = {match.params.districtId}/>
            //<h3>ID: {match.params.id}</h3>      
    );
}

render(
    <Router>
        <App/>
    </Router>, document.getElementById('app'));
