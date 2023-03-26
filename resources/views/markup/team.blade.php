@extends('markup.master')

@section('content')
    <x-common.container>
        <div class='team__container'>
            <x-common.contentBlock :row="true">
                <x-slot name="header">
                    <h3>команда</h3>
                </x-slot>
                <x-slot name="subheader">
                    <h3>Режиссёр</h3>
                </x-slot>
            </x-common.contentBlock>
            <x-common.contentContainer>
                <x-common.tabNav>
                    <x-common.link href='#' class='active' :tab="true">
                        <x-slot name="icon">
                            <x-icons.runningsmall></x-icons.runningsmall>
                        </x-slot>
                        <span class="focus">подготовка к съемке</span>
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
                <div class='team__descriptionBlock'>
                    <x-layout.team.teamCard :image="'../img/team/team.jpg'"
                                            :imageAlt="'team-img'" :name="'Николай вдровенко'" :position="'режиссёр'"
                                            :descriptionImage="'../img/team/sign.png'" :descriptionImageAlt="'sign'">
                        <x-slot name="description">
                            <p>
                                Какой Николай молодец, как он любит компанию и свою работу. Рассказ немного о его
                                профессиональных навыках и умениях. Стремлении создавать понастоящему качественный продукт
                                для клиентов Play Me.
                            </p>
                            <p>
                                Quisque idconsequat dolor. Morbi insem vitae odio malesuada semper aidurna. Phasellus
                                malesuada, lorem atultrices ullamcorper, sem dui lobortis sem, vel sollicitudin libero
                                lacus utante. Praesent aenim nec enim accumsan semper non sit amet metus. Phasellus non
                                pharetra dolor. Quisque tristique, arcu sed vehicula vehicula, sem felis bibendum tortor,
                                non dignissim exligula innulla. Suspendisse utmagna nec eros pellentesque tempus autpurus.
                                Sed egestas quis eros vitae mollis.
                            </p>
                        </x-slot>
                        <x-slot name="social">
                            <a href='javascript:void(0)'>
                                <x-icons.twitter></x-icons.twitter>
                            </a>
                            <a href='javascript:void(0)'>
                                <x-icons.facebook></x-icons.facebook>
                            </a>
                            <a href='javascript:void(0)'>
                                <x-icons.vk></x-icons.vk>
                            </a>
                            <a href='javascript:void(0)'>
                                <x-icons.youtube></x-icons.youtube>
                            </a>
                            <a href='javascript:void(0)'>
                                <x-icons.instagram></x-icons.instagram>
                            </a>
                        </x-slot>
                    </x-layout.team.teamCard>
                </div>
            </x-common.contentContainer>
            <div class='team__portfolio'>
                <x-common.contentBlock :row="true">
                    <x-slot name="header">
                        <h3>портфолио</h3>
                    </x-slot>
                    <x-slot name="arrows">
                        <div class='carousel__arrows team__arrows' data-target-carousel='teamporfolio'>
                            <button class='previous'>
                                <x-icons.arrowLeft></x-icons.arrowLeft>
                            </button>
                            <button class='next'>
                                <x-icons.arrowRight></x-icons.arrowRight>
                            </button>
                        </div>
                    </x-slot>
                </x-common.contentBlock>
                <div class='team__portfolioLinks'  data-target-carousel='teamporfolio'>
                    <x-layout.team.portfolioLink :link="'#'" :imageAlt="'portfolio-img'"
                                                 :image="'../img/team/portfolio.jpg'">
                    </x-layout.team.portfolioLink>
                    <x-layout.team.portfolioLink :link="'#'" :imageAlt="'portfolio-img'"
                                                 :image="'../img/team/portfolio.jpg'">
                    </x-layout.team.portfolioLink>
                    <x-layout.team.portfolioLink :link="'#'" :imageAlt="'portfolio-img'"
                                                 :image="'../img/team/portfolio.jpg'">
                    </x-layout.team.portfolioLink>
                    <x-layout.team.portfolioLink :link="'#'" :imageAlt="'portfolio-img'"
                                                 :image="'../img/team/portfolio.jpg'">
                    </x-layout.team.portfolioLink>
                    <x-layout.team.portfolioLink :link="'#'" :imageAlt="'portfolio-img'"
                                                 :image="'../img/team/portfolio.jpg'">
                    </x-layout.team.portfolioLink>
                    <x-layout.team.portfolioLink :link="'#'" :imageAlt="'portfolio-img'"
                                                 :image="'../img/team/portfolio.jpg'">
                    </x-layout.team.portfolioLink>
                    <x-layout.team.portfolioLink :link="'#'" :imageAlt="'portfolio-img'"
                                                 :image="'../img/team/portfolio.jpg'">
                    </x-layout.team.portfolioLink>
                    <x-layout.team.portfolioLink :link="'#'" :imageAlt="'portfolio-img'"
                                                 :image="'../img/team/portfolio.jpg'">
                    </x-layout.team.portfolioLink>
                </div>
            </div>
            <x-layout.clients.participants>
                <x-slot name="header">
                    <x-common.contentBlock>
                        <x-slot name="header">
                            <h3>Недавно просмотренные</h3>
                        </x-slot>
                    </x-common.contentBlock>
                </x-slot>
                <x-slot name="participant">
                    <x-layout.clients.participant :imageAlt="'participant'"
                                                  :image="'../img/clients/participant-1.jpg'"
                                                  :name="'Алексей Блок'" :position="'Видеомонтажёр'">

                    </x-layout.clients.participant>
                    <x-layout.clients.participant :imageAlt="'participant'"
                                                  :image="'../img/clients/participant-2.jpg'"
                                                  :name="'Ляйсан Мамедова'" :position="'Гримёр'">

                    </x-layout.clients.participant>
                    <x-layout.clients.participant :imageAlt="'participant'"
                                                  :image="'../img/clients/participant-1.jpg'"
                                                  :name="'Алексей Блок'" :position="'Видеомонтажёр'">

                    </x-layout.clients.participant>
                    <x-layout.clients.participant :imageAlt="'participant'"
                                                  :image="'../img/clients/participant-1.jpg'"
                                                  :name="'Алексей Блок'" :position="'Видеомонтажёр'">

                    </x-layout.clients.participant>
                    <x-layout.clients.participant :imageAlt="'participant'"
                                                  :image="'../img/clients/participant-1.jpg'"
                                                  :name="'Алексей Блок'" :position="'Видеомонтажёр'">

                    </x-layout.clients.participant>
                    <x-layout.clients.participant :imageAlt="'participant'"
                                                  :image="'../img/clients/participant-1.jpg'"
                                                  :name="'Алексей Блок'" :position="'Видеомонтажёр'">

                    </x-layout.clients.participant>
                    <x-layout.clients.participant :imageAlt="'participant'"
                                                  :image="'../img/clients/participant-1.jpg'"
                                                  :name="'Алексей Блок'" :position="'Видеомонтажёр'">

                    </x-layout.clients.participant>
                </x-slot>
            </x-layout.clients.participants>
        </div>
    </x-common.container>
@endsection


