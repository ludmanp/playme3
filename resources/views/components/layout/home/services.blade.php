<div class='servicesBlock'>
    <x-common.container>
        <x-common.contentBlock>
            <x-slot name="header">
                <h3>Сервисы</h3>
            </x-slot>
        </x-common.contentBlock>
        <div class='servicesBlock__carousel'>
            <x-layout.home.serviceCard :link="'#'" :header="'Подготовка к съемке'" :subheader="'Preproduction'"
                                       :image="'../img/home/services/service.jpg'" :imageAlt="'service-image'">
                <x-slot name="services">
                    <p>Создаем концепции</p>
                    <p>Оформляем проекты</p>
                    <p>Пишем сценарии</p>
                </x-slot>

            </x-layout.home.serviceCard>
            <x-layout.home.serviceCard :link="'#'" :header="'Подготовка к съемке'" :subheader="'Preproduction'"
                                       :image="'../img/home/services/service.jpg'" :imageAlt="'service-image'">
                <x-slot name="services">
                    <p>Создаем концепции</p>
                    <p>Оформляем проекты</p>
                    <p>Пишем сценарии</p>
                    <p>Пишем сценарии</p>
                    <p>Пишем сценарии</p>
                </x-slot>

            </x-layout.home.serviceCard>
            <x-layout.home.serviceCard :link="'#'" :header="'Подготовка к съемке'" :subheader="'Preproduction'"
                                       :image="'../img/home/services/service.jpg'" :imageAlt="'service-image'">
                <x-slot name="services">
                    <p>Создаем концепции</p>
                    <p>Оформляем проекты</p>
                    <p>Пишем сценарии</p>
                </x-slot>

            </x-layout.home.serviceCard>
        </div>
    </x-common.container>
</div>
