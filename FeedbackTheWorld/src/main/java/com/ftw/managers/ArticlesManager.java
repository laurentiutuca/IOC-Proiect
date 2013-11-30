package com.ftw.managers;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
import java.util.Map;
import com.ftw.interfaces.IManager;
import com.ftw.datamodel.Article;
import com.google.inject.Inject;
import com.google.inject.Singleton;

@Singleton
public class ArticlesManager implements IManager{

	public Map<Integer, List<Article> > articlesByCategory;//key category
	public Map<Integer, List<Article> > articlesByUser;//key user
	public Map<Integer, Article> allArticles;//key ID
	public List<Article> topArticlesByDate;
	public List<Article> topArticlesByRating;
	
	@Inject
	public ArticlesManager() {
		this.articlesByCategory = new HashMap<Integer, List<Article>>();
		this.articlesByUser = new HashMap<Integer, List<Article>>();
		this.allArticles = new HashMap<Integer, Article>();
		this.topArticlesByDate = new ArrayList<Article>();
		this.topArticlesByRating = new ArrayList<Article>();
		readDataBase();
	}
	
	private void readDataBase() {
		
	}
	
	public List<Article> getTopArticlesByDate() {
		return this.topArticlesByDate;
	}
	
	public List<Article> getTopArticlesByRating() {
		return this.topArticlesByRating;
	}
	
	public List<Article> getArticlesByCategory(int categoryId) {
		if(this.articlesByCategory.get(categoryId) == null)
			return new ArrayList<Article>();
		List<Article> articles = this.articlesByCategory.get(categoryId);
		
		return articles;
	}
	
	public List<Article> getArticlesByUser(int authorId) {
		if(this.articlesByUser.get(authorId) == null)
			return new ArrayList<Article>();
		
		List<Article> articles = this.articlesByUser.get(authorId);
		
		return articles;
	}
	
	public void addArticle(Article a) {
		List<Article> articles = this.getArticlesByCategory(a.getCategory());
		articles.add(0, a);
		this.articlesByCategory.put(a.getCategory(), articles);
		
		List<Article> articles2 = this.getArticlesByUser(a.getAuthorid());
		articles2.add(0, a);
		this.articlesByUser.put(a.getAuthorid(), articles2);
		
		this.topArticlesByDate.add(0, a);
		this.topArticlesByRating.add(a);
	}
	
	public Article getArticle(int id) {
		return this.allArticles.get(id);
	}
}
