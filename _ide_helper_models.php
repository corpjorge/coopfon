<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Model\Config{
/**
 * App\Model\Config\Auth
 *
 * @property int $id
 * @property int $state_id
 * @property string $name
 * @property string $path
 * @property string $description
 * @property string $icon
 * @property string|null $fields
 * @property string|null $main
 * @property array|null $parameters
 * @property string|null $version
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Config\Auth newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Config\Auth newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Config\Auth query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Config\Auth whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Config\Auth whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Config\Auth whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Config\Auth whereFields($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Config\Auth whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Config\Auth whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Config\Auth whereMain($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Config\Auth whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Config\Auth whereParameters($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Config\Auth wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Config\Auth whereStateId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Config\Auth whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Config\Auth whereVersion($value)
 */
	class Auth extends \Eloquent {}
}

namespace App\Model\Config{
/**
 * App\Model\Config\BirthDate
 *
 * @property int $id
 * @property int|null $birthday_user
 * @property int $user_id
 * @property string|null $congratulations
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\User|null $birthDayUser
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Config\BirthDate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Config\BirthDate newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Config\BirthDate query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Config\BirthDate whereBirthdayUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Config\BirthDate whereCongratulations($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Config\BirthDate whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Config\BirthDate whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Config\BirthDate whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Config\BirthDate whereUserId($value)
 */
	class BirthDate extends \Eloquent {}
}

namespace App\Model\Config{
/**
 * App\Model\Config\City
 *
 * @property int $code
 * @property int $code_dep_id
 * @property string $name
 * @property-read \App\Model\Config\Department $department
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Config\City newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Config\City newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Config\City query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Config\City whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Config\City whereCodeDepId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Config\City whereName($value)
 */
	class City extends \Eloquent {}
}

namespace App\Model\Config{
/**
 * App\Model\Config\Department
 *
 * @property int $code
 * @property string $name
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Config\Department newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Config\Department newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Config\Department query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Config\Department whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Config\Department whereName($value)
 */
	class Department extends \Eloquent {}
}

namespace App\Model\Config{
/**
 * App\Model\Config\DocumentType
 *
 * @property int $id
 * @property string $type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Config\DocumentType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Config\DocumentType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Config\DocumentType query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Config\DocumentType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Config\DocumentType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Config\DocumentType whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Config\DocumentType whereUpdatedAt($value)
 */
	class DocumentType extends \Eloquent {}
}

namespace App\Model\Config{
/**
 * App\Model\Config\ExternalSystem
 *
 * @property int $id
 * @property int $state_id
 * @property string $name
 * @property string $path
 * @property string $description
 * @property array|null $parameters
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Config\ExternalSystem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Config\ExternalSystem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Config\ExternalSystem query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Config\ExternalSystem systemActive()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Config\ExternalSystem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Config\ExternalSystem whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Config\ExternalSystem whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Config\ExternalSystem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Config\ExternalSystem whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Config\ExternalSystem whereParameters($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Config\ExternalSystem wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Config\ExternalSystem whereStateId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Config\ExternalSystem whereUpdatedAt($value)
 */
	class ExternalSystem extends \Eloquent {}
}

namespace App\Model\Config{
/**
 * App\Model\Config\Gender
 *
 * @property int $id
 * @property string $abbreviation
 * @property string $type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Config\Gender newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Config\Gender newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Config\Gender query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Config\Gender whereAbbreviation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Config\Gender whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Config\Gender whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Config\Gender whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Config\Gender whereUpdatedAt($value)
 */
	class Gender extends \Eloquent {}
}

namespace App\Model\Config{
/**
 * App\Model\Config\Member
 *
 * @property int $id
 * @property array $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Config\Member newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Config\Member newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Config\Member query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Config\Member whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Config\Member whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Config\Member whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Config\Member whereUpdatedAt($value)
 */
	class Member extends \Eloquent {}
}

namespace App\Model\Config{
/**
 * App\Model\Config\Module
 *
 * @property int $id
 * @property int $state_id
 * @property string $name
 * @property string $path
 * @property string $version
 * @property int|null $order
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Config\Module moduleExist($path)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Config\Module newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Config\Module newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Config\Module onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Config\Module query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Config\Module whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Config\Module whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Config\Module whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Config\Module whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Config\Module whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Config\Module wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Config\Module whereStateId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Config\Module whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Config\Module whereVersion($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Config\Module withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Config\Module withoutTrashed()
 */
	class Module extends \Eloquent {}
}

namespace App\Model\Pqrs{
/**
 * App\Model\Pqrs\PqConfig
 *
 * @property int $id
 * @property string|null $terms
 * @property int|null $limit_date
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Pqrs\PqConfig newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Pqrs\PqConfig newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Pqrs\PqConfig query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Pqrs\PqConfig whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Pqrs\PqConfig whereLimitDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Pqrs\PqConfig whereTerms($value)
 */
	class PqConfig extends \Eloquent {}
}

namespace App\Model\Pqrs{
/**
 * App\Model\Pqrs\PqPqr
 *
 * @property int $id
 * @property int $user_id
 * @property int|null $admin_id
 * @property string $state
 * @property string $description
 * @property string|null $reply
 * @property string|null $file
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\User|null $admin
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Pqrs\PqPqr newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Pqrs\PqPqr newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Pqrs\PqPqr pqrActive()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Pqrs\PqPqr query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Pqrs\PqPqr whereAdminId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Pqrs\PqPqr whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Pqrs\PqPqr whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Pqrs\PqPqr whereFile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Pqrs\PqPqr whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Pqrs\PqPqr whereReply($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Pqrs\PqPqr whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Pqrs\PqPqr whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Pqrs\PqPqr whereUserId($value)
 */
	class PqPqr extends \Eloquent {}
}

namespace App\Model\Pqrs{
/**
 * App\Model\Pqrs\PqPqrsExternal
 *
 * @property int $id
 * @property string $name
 * @property string $document
 * @property string $email
 * @property string $phone
 * @property int|null $admin_id
 * @property string $state
 * @property string $description
 * @property string|null $reply
 * @property string|null $file
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\User|null $admin
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Pqrs\PqPqrsExternal newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Pqrs\PqPqrsExternal newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Pqrs\PqPqrsExternal query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Pqrs\PqPqrsExternal whereAdminId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Pqrs\PqPqrsExternal whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Pqrs\PqPqrsExternal whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Pqrs\PqPqrsExternal whereDocument($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Pqrs\PqPqrsExternal whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Pqrs\PqPqrsExternal whereFile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Pqrs\PqPqrsExternal whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Pqrs\PqPqrsExternal whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Pqrs\PqPqrsExternal wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Pqrs\PqPqrsExternal whereReply($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Pqrs\PqPqrsExternal whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Pqrs\PqPqrsExternal whereUpdatedAt($value)
 */
	class PqPqrsExternal extends \Eloquent {}
}

namespace App\Model\Pqrs{
/**
 * App\Model\Pqrs\PqrUser
 *
 * @property int $id
 * @property int $role_id
 * @property string $name
 * @property string|null $email
 * @property string|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property string|null $social_id
 * @property int|null $document_type_id
 * @property string|null $document
 * @property int|null $phone
 * @property string|null $code
 * @property int|null $member_id
 * @property int|null $gender_id
 * @property string|null $address
 * @property string|null $area
 * @property int|null $city_id
 * @property string|null $picture
 * @property string|null $birth_date
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Model\Config\City|null $city
 * @property-read \App\Model\Config\DocumentType|null $documentType
 * @property-read \App\Model\Config\Gender|null $gender
 * @property-read mixed $full_name
 * @property-read \App\Model\Config\Member|null $member
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\Config\Module[] $modules
 * @property-read int|null $modules_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\Pqrs\PqPqr[] $pqrs
 * @property-read int|null $pqrs_count
 * @property-read \App\Role $role
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Pqrs\PqrUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Pqrs\PqrUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Pqrs\PqrUser query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Pqrs\PqrUser whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Pqrs\PqrUser whereArea($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Pqrs\PqrUser whereBirthDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Pqrs\PqrUser whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Pqrs\PqrUser whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Pqrs\PqrUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Pqrs\PqrUser whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Pqrs\PqrUser whereDocument($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Pqrs\PqrUser whereDocumentTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Pqrs\PqrUser whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Pqrs\PqrUser whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Pqrs\PqrUser whereGenderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Pqrs\PqrUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Pqrs\PqrUser whereMemberId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Pqrs\PqrUser whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Pqrs\PqrUser wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Pqrs\PqrUser wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Pqrs\PqrUser wherePicture($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Pqrs\PqrUser whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Pqrs\PqrUser whereRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Pqrs\PqrUser whereSocialId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Pqrs\PqrUser whereUpdatedAt($value)
 */
	class PqrUser extends \Eloquent {}
}

namespace App{
/**
 * App\Role
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Role newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Role query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Role whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Role whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Role whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Role whereUpdatedAt($value)
 */
	class Role extends \Eloquent {}
}

namespace App{
/**
 * App\User
 *
 * @property int $id
 * @property int $role_id
 * @property string $name
 * @property string|null $email
 * @property string|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property string|null $social_id
 * @property int|null $document_type_id
 * @property string|null $document
 * @property int|null $phone
 * @property string|null $code
 * @property int|null $member_id
 * @property int|null $gender_id
 * @property string|null $address
 * @property string|null $area
 * @property int|null $city_id
 * @property string|null $picture
 * @property string|null $birth_date
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Model\Config\City|null $city
 * @property-read \App\Model\Config\DocumentType|null $documentType
 * @property-read \App\Model\Config\Gender|null $gender
 * @property-read mixed $full_name
 * @property-read \App\Model\Config\Member|null $member
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\Config\Module[] $modules
 * @property-read int|null $modules_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \App\Role $role
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\User onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereArea($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereBirthDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereDocument($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereDocumentTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereGenderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereMemberId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePicture($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereSocialId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\User withoutTrashed()
 */
	class User extends \Eloquent {}
}

