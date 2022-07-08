@extends('markup.master')

@section('content')
    <x-common.container>
        <div class='blogArticle__container'>
            <x-common.contentBlock :row="true">
                <x-slot name="header">
                    <h3>блог</h3>
                </x-slot>
                <x-slot name="subheader">
                    <h3>стримы</h3>
                </x-slot>
                <x-slot name="additionalHeader">
                    <h3>Организация moscow travel hack</h3>
                </x-slot>
            </x-common.contentBlock>
            <x-common.contentContainer>
                <x-common.tabNav>
                    <x-common.link href='#' class='active' :tab="true">
                        <x-slot name="icon">
                            <x-icons.runningsmall></x-icons.runningsmall>
                        </x-slot>
                        <span class="focus">стримы</span>
                    </x-common.link>
                    <x-common.link href='#' :tab="true">
                        <x-slot name="icon">
                            <x-icons.runningsmall></x-icons.runningsmall>
                        </x-slot>
                        <span class="focus">съемка</span>
                    </x-common.link>
                    <x-common.link href='#' :tab="true">
                        <x-slot name="icon">
                            <x-icons.runningsmall></x-icons.runningsmall>
                        </x-slot>
                        <span class="focus">Создание видео</span>
                    </x-common.link>
                    <x-common.link href='#' :tab="true">
                        <x-slot name="icon">
                            <x-icons.runningsmall></x-icons.runningsmall>
                        </x-slot>
                        <span class="focus">ПРЯМОЙ ЭФИР</span>
                    </x-common.link>
                </x-common.tabNav>
                <div class='blogArticle__content'>
                    <x-layout.blog.blogArticleHeader :author="'ФИ автора'" :date="'01.01.2021'"
                                                     :authorImage="'../img/home/blog/author.jpg'"
                                                     :authorImageAlt="'author-image'" :location="'Локация'"
                                                     :header="'Расстановка света и камер'">
                        <x-slot name="tags">
                            <x-common.link :tag="true">
                                #ВидеосъёмкаМерроприятий
                            </x-common.link>
                            <x-common.link :tag="true">
                                #Видео
                            </x-common.link>
                        </x-slot>
                    </x-layout.blog.blogArticleHeader>
                    <x-layout.blog.blogArticleContent>
                        <x-layout.blog.blogSingleText>
                            <x-slot name="text">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ineuante feugiat, blandit leo at,
                                venenatis odio. Fusce laoreet idmagna ineuismod. Fusce condimentum urna vitae velit
                                dignissim condimentum. Quisque idconsequat dolor. Morbi insem vitae odio malesuada semper
                                aidurna. Phasellus malesuada, lorem atultrices ullamcorper, sem dui lobortis sem, vel
                                sollicitudin libero lacus utante. Praesent aenim nec enim accumsan semper non sit amet
                                metus. Phasellus non pharetra dolor. Quisque tristique, arcu sed vehicula vehicula, sem
                                felis bibendum tortor, non dignissim exligula innulla. Suspendisse utmagna nec eros
                                pellentesque tempus autpurus. Sed egestas quis eros vitae mollis.
                            </x-slot>
                        </x-layout.blog.blogSingleText>
                        <x-layout.blog.blogTextImage :image="'../img/blog/blog.jpg'" :imageAlt="'blog'">
                            <x-slot name="text">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ineuante feugiat, blandit leo at,
                                    venenatis odio. Fusce laoreet idmagna ineuismod. Fusce condimentum urna vitae velit
                                    dignissim condimentum. Quisque idconsequat dolor.</p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ineuante feugiat, blandit leo at,
                                    venenatis odio. Fusce laoreet idmagna ineuismod. Fusce condimentum urna vitae velit
                                    dignissim condimentum. Quisque idconsequat dolor.</p>
                            </x-slot>
                        </x-layout.blog.blogTextImage>
                        <x-layout.blog.blogArticleImage :image="'../img/blog/blog-big.jpg'" :imageAlt="'blog'">
                        </x-layout.blog.blogArticleImage>
                    </x-layout.blog.blogArticleContent>
                </div>
            </x-common.contentContainer>
            <x-layout.clients.clientsAdditional></x-layout.clients.clientsAdditional>
        </div>
    </x-common.container>
@endsection


