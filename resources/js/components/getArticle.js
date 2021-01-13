import React, { Component } from 'react';
import {categoryId } from './NewsPostComponents/CategoryNews'

export async function getArticle() {
    
    try {
       let articles = await fetch('api/cate/'+{categoryId});
    }
    catch (error){
        throw error
    }

    return articles.json();
}

export default getArticle;