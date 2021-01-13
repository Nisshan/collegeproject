import React, { Component , Fragment} from 'react';

export class PostAuthorDetails extends React.Component {
    
    constructor(props) {
        super(props);
        //const { cateUrl } = this.props;
        //console.log(this.props)
        this.state = {
            users: [],
            urlUserId: '/api/getUserById/'+this.props.userId
        };
    }
    
    async getUserDetailsByPosts(){
        try{
            const data = await fetch(this.state.urlUserId);
            //console.log(data);
            const userData = await data.json();
            console.log(userData);
            this.setState({
                users: userData
            });
        }catch(error){
            console.log(error);
        }
    }

    componentDidMount (){
        this.getUserDetailsByPosts();
    }

    render() {
        const { user } = this.state;
        console.log(this.state);
        return (
            <Fragment>
                {this.state.users.map(user =>{
                    return(
                    <div className="blog-post-author d-flex" key={user.id}>
                        <div className="author-thumbnail">
                            <img src="/img/bg-img/32.jpg" alt=""/>
                        </div>
                        <div className="author-info">
                            <a href="#" className="author-name">{user.name}, <span>The Author</span></a>
                            <p>Donec turpis erat, scelerisque id euismod sit amet, fermentum vel dolor. Nulla facilisi. Sed pellen tesque lectus et accu msan aliquam. Fusce lobortis cursus quam, id mattis sapien.</p>
                        </div>  
                    </div> 
                    )
                })}
            </Fragment>
        );
    }
}
