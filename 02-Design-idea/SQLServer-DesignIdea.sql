CREATE TABLE "Comments"(
    "IdeaID" INT NOT NULL,
    "CommentID" INT NOT NULL,
    "CommentDate" DATE NOT NULL,
    "UserID" INT NOT NULL,
    "CommentText" TEXT NOT NULL
);
ALTER TABLE
    "Comments" ADD CONSTRAINT "comments_commentid_primary" PRIMARY KEY("CommentID");
CREATE TABLE "Sections"(
    "SectionName" VARCHAR(100) NOT NULL,
    "SectionID" INT NOT NULL
);
ALTER TABLE
    "Sections" ADD CONSTRAINT "sections_sectionid_primary" PRIMARY KEY("SectionID");
CREATE TABLE "Ideas"(
    "IdeaID" INT NOT NULL,
    "Title" VARCHAR(255) NOT NULL,
    "UserID" INT NOT NULL,
    "DesignImage" VARBINARY(MAX) NULL,
    "Description" TEXT NULL,
    "CategoryID" INT NOT NULL
);
ALTER TABLE
    "Ideas" ADD CONSTRAINT "ideas_ideaid_primary" PRIMARY KEY("IdeaID");
CREATE TABLE "Users"(
    "Password" VARCHAR(255) NOT NULL,
    "UserName" VARCHAR(50) NOT NULL,
    "Email" VARCHAR(100) NOT NULL,
    "Role" VARCHAR(255) NOT NULL,
    "UserID" INT NOT NULL
);
ALTER TABLE
    "Users" ADD CONSTRAINT "users_userid_primary" PRIMARY KEY("UserID");
CREATE TABLE "SectionIdeas"(
    "SectionID" INT NOT NULL,
    "IdeaID" INT NOT NULL,
    "SectionIdeaID" INT NOT NULL
);
ALTER TABLE
    "SectionIdeas" ADD CONSTRAINT "sectionideas_sectionideaid_primary" PRIMARY KEY("SectionIdeaID");
CREATE TABLE "Categories"(
    "CategoryName" VARCHAR(100) NOT NULL,
    "CategoryID" INT NOT NULL
);
ALTER TABLE
    "Categories" ADD CONSTRAINT "categories_categoryid_primary" PRIMARY KEY("CategoryID");
ALTER TABLE
    "SectionIdeas" ADD CONSTRAINT "sectionideas_sectionid_foreign" FOREIGN KEY("SectionID") REFERENCES "Sections"("SectionID");
ALTER TABLE
    "Ideas" ADD CONSTRAINT "ideas_userid_foreign" FOREIGN KEY("UserID") REFERENCES "Users"("UserID");
ALTER TABLE
    "Comments" ADD CONSTRAINT "comments_ideaid_foreign" FOREIGN KEY("IdeaID") REFERENCES "Ideas"("IdeaID");
ALTER TABLE
    "Ideas" ADD CONSTRAINT "ideas_categoryid_foreign" FOREIGN KEY("CategoryID") REFERENCES "Categories"("CategoryID");
ALTER TABLE
    "SectionIdeas" ADD CONSTRAINT "sectionideas_ideaid_foreign" FOREIGN KEY("IdeaID") REFERENCES "Ideas"("IdeaID");
ALTER TABLE
    "Comments" ADD CONSTRAINT "comments_userid_foreign" FOREIGN KEY("UserID") REFERENCES "Users"("UserID");