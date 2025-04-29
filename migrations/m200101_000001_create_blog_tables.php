<?php

use yii\db\Migration;

class m200101_000001_create_blog_tables extends Migration
{
    public function safeUp()
    {
        // Users table
        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'email' => $this->string()->notNull()->unique(),
            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);

        // Categories table
        $this->createTable('{{%category}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'slug' => $this->string()->notNull()->unique(),
            'description' => $this->text(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);

        // Tags table
        $this->createTable('{{%tag}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'slug' => $this->string()->notNull()->unique(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);

        // Posts table
        $this->createTable('{{%post}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'slug' => $this->string()->notNull()->unique(),
            'content' => $this->text()->notNull(),
            'excerpt' => $this->text(),
            'status' => $this->smallInteger()->notNull()->defaultValue(1),
            'category_id' => $this->integer(),
            'author_id' => $this->integer()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);

        // Post-Tag relation table
        $this->createTable('{{%post_tag}}', [
            'post_id' => $this->integer()->notNull(),
            'tag_id' => $this->integer()->notNull(),
        ]);

        // Comments table
        $this->createTable('{{%comment}}', [
            'id' => $this->primaryKey(),
            'content' => $this->text()->notNull(),
            'status' => $this->smallInteger()->notNull()->defaultValue(1),
            'post_id' => $this->integer()->notNull(),
            'author_id' => $this->integer(),
            'author_name' => $this->string(),
            'author_email' => $this->string(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);

        // Add foreign keys
        $this->addForeignKey(
            'fk-post-category_id',
            '{{%post}}',
            'category_id',
            '{{%category}}',
            'id',
            'SET NULL'
        );

        $this->addForeignKey(
            'fk-post-author_id',
            '{{%post}}',
            'author_id',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-post_tag-post_id',
            '{{%post_tag}}',
            'post_id',
            '{{%post}}',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-post_tag-tag_id',
            '{{%post_tag}}',
            'tag_id',
            '{{%tag}}',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-comment-post_id',
            '{{%comment}}',
            'post_id',
            '{{%post}}',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-comment-author_id',
            '{{%comment}}',
            'author_id',
            '{{%user}}',
            'id',
            'SET NULL'
        );

        // Add indexes
        $this->createIndex('idx-post-status', '{{%post}}', 'status');
        $this->createIndex('idx-comment-status', '{{%comment}}', 'status');
        $this->createIndex('idx-post_tag-unique', '{{%post_tag}}', ['post_id', 'tag_id'], true);
    }

    public function safeDown()
    {
        $this->dropTable('{{%comment}}');
        $this->dropTable('{{%post_tag}}');
        $this->dropTable('{{%post}}');
        $this->dropTable('{{%tag}}');
        $this->dropTable('{{%category}}');
        $this->dropTable('{{%user}}');
    }
} 