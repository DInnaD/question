<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About My pour knowledge and trouble: I have this #1 with Postman but I need this #2

*it have to be without  "pivot": {
                            "user_id": 1,
                            "vacancy_id": 1) and "api_token": "d5YghnQQzieu4oPIOQz0P1EEhDq2NzgBdp82isNX0sAeI4MRY5VHGB2Qx5OO", and "deleted_at" and  "workers": [] have to locate like  "vacancies": []  but have no as "vacancies": [{"workers": []}]
                            
**it have to be "data": { "creator": {}"vacancies": [],"workers": []}

{{host}}/api/organization/1?vacancies=1&workers=1

thsi #1:
{
    "success": true,
    "data": {
        "id": 1,
        "title": "Accusantium architecto et molestias harum.",
        "country": "France",
        "city": "Port Estherberg",
        "creator_id": 2,
        "created_at": "2019-09-17 06:07:17",
        "updated_at": "2019-09-17 06:07:17",
        "deleted_at": null,
        "creator": {
            "id": 2,
            "email": "new_email@localhost1",
            "first_name": "fname1",
            "last_name": "lname",
            "country": "Ukraine",
            "city": "Poltava",
            "phone": "833246",
            "role": "worker",
            "api_token": "d5YghnQQzieu4oPIOQz0P1EEhDq2NzgBdp82isNX0sAeI4MRY5VHGB2Qx5OO",
            "created_at": "2019-09-17 06:07:16",
            "updated_at": "2019-09-19 10:45:56",
            "deleted_at": null,
            "vacancymy_id": null
        },
        "vacancies": [
            {
                "id": 1,
                "vacancy_name": "Dicki",
                "workers_amount": 21,
                "organization_id": 1,
                "salary": 91888,
                "created_at": "2019-09-17 06:07:20",
                "updated_at": "2019-09-17 06:07:20",
                "deleted_at": null,
                "organizationmy_id": null,
                "workers_booked": 1,
                "status": "active",
                "workers": [
                    {
                        "id": 1,
                        "email": "admin@localhost",
                        "first_name": "Inna",
                        "last_name": "Da",
                        "country": "Ukraine",
                        "city": "Poltava",
                        "phone": "06372391",
                        "role": "admin",
                        "api_token": "jK8qvFAhVCnhep0kReQ0gcVOUCnSWRUP5twkQMphlMqdmEiwFMLKSrojmQls",
                        "created_at": "2019-09-17 06:07:16",
                        "updated_at": "2019-09-19 11:48:44",
                        "deleted_at": null,
                        "vacancymy_id": null,
                        "pivot": {
                            "user_id": 1,
                            "vacancy_id": 1
                        }
                    }
                ]
            }
        ]
    }
}

**************************
THIS #2

{
    "success": true,
    "data": {
        "id": 1,
        "title": "Reuben Kling",
        "city": "Abelchester",
        "country": "Cote d'Ivoire",
        "created_at": "2019-09-02 10:07:59",
        "updated_at": "2019-09-02 10:07:59",
        "creator": {
            "id": 2,
            "role": "employer",
            "email": "alvis.paucek@example.org",
            "first_name": "Deshawn",
            "last_name": "Nienow",
            "country": "Mauritania",
            "city": "Mosciskishire",
            "phone": "(715) 881-9216",
            "created_at": "2019-09-02 10:07:59",
            "updated_at": "2019-09-02 10:07:59"
        },
        "vacancies": [
            {
                "id": 2,
                "status": "active",
                "vacancy_name": "Amparo Kilback",
                "workers_amount": 3,
                "workers_booked": 1,
                "organization": "Reuben Kling",
                "salary": 5919,
                "created_at": "2019-09-02 10:07:59",
                "updated_at": "2019-09-02 10:07:59"
            }
        ],
        "workers": [
            {
                "id": 53,
                "role": "worker",
                "email": "mboyer@example.com",
                "first_name": "Bianka",
                "last_name": "Fay",
                "country": "Benin",
                "city": "North Albinstad",
                "phone": "1-368-236-7923 x648",
                "created_at": "2019-09-02 10:08:05",
                "updated_at": "2019-09-02 10:08:05"
            }
        ]
    }
}
