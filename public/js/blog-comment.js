class BlogComment {

    constructor(authorImageUrl, authorName, date, content) {
        this.author_image_url = authorImageUrl;
        this.author_name = authorName;
        this.date_readable = date;
        this.content = content;
    }

    get resultHTML() {
        return `
            <div class="comment_box commentbox1">
                <div class="gravatar">
                    <img src="${this.author_image_url}" alt="author"/>
                </div>

                <div class="comment_text">
                    <div class="comment_author">
                        ${this.author_name} ${this.date_readable}
                    </div>
                    <p>${this.content}</p>
                </div>
                <div class="cleaner"></div>
            </div>
            `;
    }
}
