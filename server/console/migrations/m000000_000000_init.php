<?php

class m000000_000000_init extends \console\components\Migration
{
    public function safeUp()
    {
        $this->user();
        $this->userProfile();

        $this->message();

        $this->page();
        $this->pageContent();

        $this->news();
        $this->newsContent();

        $this->textBlock();
        $this->textBlockContent();

        $this->variable();

        $this->createRelations();
    }

    public function down()
    {
        $this->dropForeignKey('FK_user_profile_rel_userId', '{{%user_profile}}');

        $this->dropForeignKey('FK_page_rel_createdBy', '{{%page}}');
        $this->dropForeignKey('FK_page_rel_updatedBy', '{{%page}}');
        $this->dropForeignKey('FK_page_content_rel_pageId', '{{%page_content}}');

        $this->dropForeignKey('FK_news_rel_createdBy', '{{%news}}');
        $this->dropForeignKey('FK_news_rel_updatedBy', '{{%news}}');
        $this->dropForeignKey('FK_news_content_rel_newsId', '{{%news_content}}');

        $this->dropForeignKey('FK_text_block_rel_createdBy', '{{%text_block}}');
        $this->dropForeignKey('FK_text_block_rel_updatedBy', '{{%text_block}}');
        $this->dropForeignKey('FK_text_block_content_rel_textBlockId', '{{%text_block_content}}');

        $this->dropForeignKey('FK_variable_rel_createdBy', '{{%variable}}');
        $this->dropForeignKey('FK_variable_rel_updatedBy', '{{%variable}}');

        $this->dropTable('{{%user}}');
        $this->dropTable('{{%user_profile}}');

        $this->dropTable('{{%message}}');

        $this->dropTable('{{%page}}');
        $this->dropTable('{{%page_content}}');

        $this->dropTable('{{%news}}');
        $this->dropTable('{{%news_content}}');

        $this->dropTable('{{%text_block}}');
        $this->dropTable('{{%text_block_content}}');

        $this->dropTable('{{%variable}}');
    }

    public function user()
    {
        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull(),
            'email' => $this->string()->notNull(),
            'authKey' => $this->string()->notNull(),
            'passwordHash' => $this->string()->notNull(),
            'passwordResetToken' => $this->string()->notNull(),
            'createdAt' => $this->dateTime(),
            'updatedAt' => $this->dateTime(),
            'status' => $this->smallInteger(),
        ], $this->getDefaultTableOptions());
    }

    public function userProfile()
    {
        $this->createTable('{{%user_profile}}', [
            'userId' => $this->integer(),
            'firstName' => $this->string(),
            'lastName' => $this->string(),
            'phoneNumber' => $this->string(),
            'city' => $this->string(),
            'region' => $this->string(),
            'country' => $this->string(),
            'address' => $this->string(),
            'address2' => $this->string(),
            'address3' => $this->string(),
            'zipCode' => $this->string(),
            'birthday' => $this->date()
        ], $this->getDefaultTableOptions());
        $this->addPrimaryKey('PK_user_profile', '{{%user_profile}}', 'userId');
    }

    public function message()
    {
        $this->createTable('{{%message}}', [
            'id' => $this->primaryKey(),
            'form' => $this->string()->notNull(),
            'title' => $this->string()->notNull(),
            'data' => $this->text(),
            'message' => $this->text()->notNull(),
            'ip' => $this->string()->notNull(),
            'location' => $this->string(),
            'siteLanguage' => $this->string(),
            'createdAt' => $this->dateTime(),
            'updatedAt' => $this->dateTime(),
            'status' => $this->smallInteger(),
        ], $this->getDefaultTableOptions());
    }

    public function page()
    {
        $this->createTable('{{%page}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'createdAt' => $this->dateTime(),
            'updatedAt' => $this->dateTime(),
            'createdBy' => $this->integer(),
            'updatedBy' => $this->integer(),
            'status' => $this->smallInteger(),
        ], $this->getDefaultTableOptions());
    }

    public function pageContent()
    {
        $this->createTable('{{%page_content}}', [
            'pageId' => $this->integer(),
            'url' => $this->string(),
            'language' => $this->string(),
            'content' => $this->text(),
            'meteTitle' => $this->string(),
            'meteKeywords' => $this->string(),
            'meteDescription' => $this->text(),
            'status' => $this->smallInteger(),
        ], $this->getDefaultTableOptions());

        $this->addPrimaryKey('PK_page_content', '{{%page_content}}', 'pageId');
    }

    public function news()
    {
        $this->createTable('{{%news}}', [
            'id' => $this->primaryKey(),
            'date' => $this->dateTime()->notNull(),
            'name' => $this->string()->notNull(),
            'createdAt' => $this->dateTime(),
            'updatedAt' => $this->dateTime(),
            'createdBy' => $this->integer(),
            'updatedBy' => $this->integer(),
            'status' => $this->smallInteger(),
        ], $this->getDefaultTableOptions());
    }

    public function newsContent()
    {
        $this->createTable('{{%news_content}}', [
            'newsId' => $this->integer(),
            'url' => $this->string(),
            'language' => $this->string(),
            'content' => $this->text(),
            'meteTitle' => $this->string(),
            'meteKeywords' => $this->string(),
            'meteDescription' => $this->text(),
            'status' => $this->smallInteger(),
        ], $this->getDefaultTableOptions());

        $this->addPrimaryKey('PK_news_content', '{{%news_content}}', 'newsId');
    }

    public function textBlock()
    {
        $this->createTable('{{%text_block}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'shortcut' => $this->string()->notNull(),
            'createdAt' => $this->dateTime(),
            'updatedAt' => $this->dateTime(),
            'createdBy' => $this->integer(),
            'updatedBy' => $this->integer(),
            'status' => $this->smallInteger(),
        ], $this->getDefaultTableOptions());
    }

    public function textBlockContent()
    {
        $this->createTable('{{%text_block_content}}', [
            'textBlockId' => $this->integer(),
            'language' => $this->string(),
            'content' => $this->text(),
            'status' => $this->smallInteger(),
        ], $this->getDefaultTableOptions());

        $this->addPrimaryKey('PK_text_block_content', '{{%text_block_content}}', 'textBlockId');
    }

    public function variable()
    {
        $this->createTable('{{%variable}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'shortcut' => $this->string()->notNull(),
            'type' => $this->integer(),
            'content' => $this->text(),
            'createdAt' => $this->dateTime(),
            'updatedAt' => $this->dateTime(),
            'createdBy' => $this->integer(),
            'updatedBy' => $this->integer(),
            'status' => $this->smallInteger(),
        ], $this->getDefaultTableOptions());
    }

    public function createRelations()
    {
        /**
         * Relation: user_profile
         */
        $this->addForeignKey('FK_user_profile_rel_userId', '{{%user_profile}}', 'userId', '{{%user}}', 'id', 'CASCADE', 'CASCADE');

        /**
         * Relation: page
         */
        $this->addForeignKey('FK_page_rel_createdBy', '{{%page}}', 'createdBy', '{{%user}}', 'id', 'SET NULL', 'SET NULL');
        $this->addForeignKey('FK_page_rel_updatedBy', '{{%page}}', 'updatedBy', '{{%user}}', 'id', 'SET NULL', 'SET NULL');

        /**
         * Relation: page_content
         */
        $this->addForeignKey('FK_page_content_rel_pageId', '{{%page_content}}', 'pageId', '{{%page}}', 'id', 'CASCADE', 'CASCADE');

        /**
         * Relation: news
         */
        $this->addForeignKey('FK_news_rel_createdBy', '{{%news}}', 'createdBy', '{{%user}}', 'id', 'SET NULL', 'SET NULL');
        $this->addForeignKey('FK_news_rel_updatedBy', '{{%news}}', 'updatedBy', '{{%user}}', 'id', 'SET NULL', 'SET NULL');

        /**
         * Relation: news_content
         */
        $this->addForeignKey('FK_news_content_rel_newsId', '{{%news_content}}', 'newsId', '{{%news}}', 'id', 'CASCADE', 'CASCADE');

        /**
         * Relation: text_block
         */
        $this->addForeignKey('FK_text_block_rel_createdBy', '{{%text_block}}', 'createdBy', '{{%user}}', 'id', 'SET NULL', 'SET NULL');
        $this->addForeignKey('FK_text_block_rel_updatedBy', '{{%text_block}}', 'updatedBy', '{{%user}}', 'id', 'SET NULL', 'SET NULL');

        /**
         * Relation: text_block_content
         */
        $this->addForeignKey('FK_text_block_content_rel_textBlockId', '{{%text_block_content}}', 'textBlockId', '{{%text_block}}', 'id', 'CASCADE', 'CASCADE');

        /**
         * Relation: variable
         */
        $this->addForeignKey('FK_variable_rel_createdBy', '{{%variable}}', 'createdBy', '{{%user}}', 'id', 'SET NULL', 'SET NULL');
        $this->addForeignKey('FK_variable_rel_updatedBy', '{{%variable}}', 'updatedBy', '{{%user}}', 'id', 'SET NULL', 'SET NULL');
    }
}
