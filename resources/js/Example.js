import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import { Blog } from './components/Blog';
import { Header } from './components/Header';

export default class Example extends Component {
    render() {
        return (
            <div className="container">
            <div className="row">
                <Header/>  
            </div>
        
        
        <div className="row">
            <Blog/>
        </div>
        </div>
        );
    }
}

if (document.getElementById('example')) {
    ReactDOM.render(<Example/>, document.getElementById('example'));
}
