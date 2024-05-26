<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $blood_request_id
 * @property int $blood_type_id
 * @property string $donation_date
 * @property int $venue_id
 * @property string $message
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|AdminPost newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AdminPost newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AdminPost query()
 * @method static \Illuminate\Database\Eloquent\Builder|AdminPost whereBloodRequestId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminPost whereBloodTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminPost whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminPost whereDonationDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminPost whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminPost whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminPost whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminPost whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminPost whereVenueId($value)
 */
	class AdminPost extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $user_id
 * @property string $module
 * @property string $action
 * @property string $status
 * @property string $ip_address
 * @property string $region
 * @property string $city
 * @property string $postal
 * @property string $latitude
 * @property string $longitude
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|AuditTrail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AuditTrail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AuditTrail query()
 * @method static \Illuminate\Database\Eloquent\Builder|AuditTrail whereAction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AuditTrail whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AuditTrail whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AuditTrail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AuditTrail whereIpAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AuditTrail whereLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AuditTrail whereLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AuditTrail whereModule($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AuditTrail wherePostal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AuditTrail whereRegion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AuditTrail whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AuditTrail whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AuditTrail whereUserId($value)
 * @mixin \Eloquent
 * @property int $module_category_id
 * @method static \Illuminate\Database\Eloquent\Builder|AuditTrail whereModuleCategoryId($value)
 */
	class AuditTrail extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $type
 * @property int $min_donated
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|BadgeType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BadgeType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BadgeType query()
 * @method static \Illuminate\Database\Eloquent\Builder|BadgeType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BadgeType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BadgeType whereMinDonated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BadgeType whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BadgeType whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BadgeType whereUpdatedAt($value)
 */
	class BadgeType extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string|null $brgyCode
 * @property string|null $brgyDesc
 * @property string|null $regCode
 * @property int|null $provCode
 * @property int|null $citymunCode
 * @method static \Illuminate\Database\Eloquent\Builder|Barangay newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Barangay newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Barangay query()
 * @method static \Illuminate\Database\Eloquent\Builder|Barangay whereBrgyCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Barangay whereBrgyDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Barangay whereCitymunCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Barangay whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Barangay whereProvCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Barangay whereRegCode($value)
 * @mixin \Eloquent
 */
	class Barangay extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $first_name
 * @property string $middle_name
 * @property string $last_name
 * @property int $sex_id
 * @property string $region
 * @property string $province
 * @property string $municipality
 * @property string $barangay
 * @property string $street
 * @property string $zip_code
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|BledBy newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BledBy newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BledBy query()
 * @method static \Illuminate\Database\Eloquent\Builder|BledBy whereBarangay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BledBy whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BledBy whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BledBy whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BledBy whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BledBy whereMiddleName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BledBy whereMunicipality($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BledBy whereProvince($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BledBy whereRegion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BledBy whereSexId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BledBy whereStreet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BledBy whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BledBy whereZipCode($value)
 */
	class BledBy extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $user_id
 * @property int $donation_type_id
 * @property int $venue_id
 * @property int $bled_by_id
 * @property string $serial_no
 * @property string $date_donated
 * @property string $expiration_date
 * @property int $isCollected
 * @property int $isTested
 * @property int $isStored
 * @property int $isUsed
 * @property int $isExpired
 * @property int $isUnsafe
 * @property int $isDisposed
 * @property string|null $dispensed_date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|BloodBag newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BloodBag newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BloodBag query()
 * @method static \Illuminate\Database\Eloquent\Builder|BloodBag whereBledById($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BloodBag whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BloodBag whereDateDonated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BloodBag whereDispensedDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BloodBag whereDonationTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BloodBag whereExpirationDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BloodBag whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BloodBag whereIsCollected($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BloodBag whereIsDisposed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BloodBag whereIsExpired($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BloodBag whereIsStored($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BloodBag whereIsTested($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BloodBag whereIsUnsafe($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BloodBag whereIsUsed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BloodBag whereSerialNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BloodBag whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BloodBag whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BloodBag whereVenueId($value)
 */
	class BloodBag extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|BloodComponent newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BloodComponent newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BloodComponent query()
 * @method static \Illuminate\Database\Eloquent\Builder|BloodComponent whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BloodComponent whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BloodComponent whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BloodComponent whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BloodComponent whereUpdatedAt($value)
 */
	class BloodComponent extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $user_id
 * @property string $request_no
 * @property int $blood_units
 * @property int $blood_component_id
 * @property string $diagnosis
 * @property string $hospital
 * @property string $transfusion_date
 * @property int|null $request_status_id
 * @property int $isPosted
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|BloodRequest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BloodRequest newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BloodRequest query()
 * @method static \Illuminate\Database\Eloquent\Builder|BloodRequest whereBloodComponentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BloodRequest whereBloodUnits($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BloodRequest whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BloodRequest whereDiagnosis($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BloodRequest whereHospital($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BloodRequest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BloodRequest whereIsPosted($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BloodRequest whereRequestNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BloodRequest whereRequestStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BloodRequest whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BloodRequest whereTransfusionDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BloodRequest whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BloodRequest whereUserId($value)
 */
	class BloodRequest extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $blood_type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|BloodType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BloodType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BloodType query()
 * @method static \Illuminate\Database\Eloquent\Builder|BloodType whereBloodType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BloodType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BloodType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BloodType whereUpdatedAt($value)
 */
	class BloodType extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $deferral_type_id
 * @property string $category
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|DeferralCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DeferralCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DeferralCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|DeferralCategory whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeferralCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeferralCategory whereDeferralTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeferralCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeferralCategory whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeferralCategory whereUpdatedAt($value)
 */
	class DeferralCategory extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $user_id
 * @property string $date_deffered
 * @property int $deferral_type_id
 * @property int $deferral_category_id
 * @property string|null $other_reason
 * @property int|null $deferral_duration
 * @property string|null $end_date
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|DeferralList newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DeferralList newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DeferralList query()
 * @method static \Illuminate\Database\Eloquent\Builder|DeferralList whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeferralList whereDateDeffered($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeferralList whereDeferralCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeferralList whereDeferralDuration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeferralList whereDeferralTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeferralList whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeferralList whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeferralList whereOtherReason($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeferralList whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeferralList whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeferralList whereUserId($value)
 */
	class DeferralList extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $type
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|DeferralType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DeferralType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DeferralType query()
 * @method static \Illuminate\Database\Eloquent\Builder|DeferralType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeferralType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeferralType whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeferralType whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeferralType whereUpdatedAt($value)
 */
	class DeferralType extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $blood_bag_id
 * @property int $patient_details_id
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|DispenseList newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DispenseList newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DispenseList query()
 * @method static \Illuminate\Database\Eloquent\Builder|DispenseList whereBloodBagId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DispenseList whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DispenseList whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DispenseList wherePatientDetailsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DispenseList whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DispenseList whereUpdatedAt($value)
 */
	class DispenseList extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|DisposeClassification newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DisposeClassification newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DisposeClassification query()
 * @method static \Illuminate\Database\Eloquent\Builder|DisposeClassification whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DisposeClassification whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DisposeClassification whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DisposeClassification whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DisposeClassification whereUpdatedAt($value)
 */
	class DisposeClassification extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $blood_bag_id
 * @property string $disposed_date
 * @property int $dispose_by
 * @property int $dispose_classification_id
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|DisposedBloodBag newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DisposedBloodBag newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DisposedBloodBag query()
 * @method static \Illuminate\Database\Eloquent\Builder|DisposedBloodBag whereBloodBagId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DisposedBloodBag whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DisposedBloodBag whereDisposeBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DisposedBloodBag whereDisposeClassificationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DisposedBloodBag whereDisposedDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DisposedBloodBag whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DisposedBloodBag whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DisposedBloodBag whereUpdatedAt($value)
 */
	class DisposedBloodBag extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $type
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|DonationType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DonationType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DonationType query()
 * @method static \Illuminate\Database\Eloquent\Builder|DonationType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DonationType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DonationType whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DonationType whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DonationType whereUpdatedAt($value)
 */
	class DonationType extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $user_id
 * @property int $donate_qty
 * @property int $badge_type_id
 * @property int $donor_type_id
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|DonorList newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DonorList newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DonorList query()
 * @method static \Illuminate\Database\Eloquent\Builder|DonorList whereBadgeTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DonorList whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DonorList whereDonateQty($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DonorList whereDonorTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DonorList whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DonorList whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DonorList whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DonorList whereUserId($value)
 */
	class DonorList extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $type
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|DonorType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DonorType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DonorType query()
 * @method static \Illuminate\Database\Eloquent\Builder|DonorType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DonorType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DonorType whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DonorType whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DonorType whereUpdatedAt($value)
 */
	class DonorType extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $region
 * @property string $province
 * @property string $municipality
 * @property string $barangay
 * @property string $street
 * @property string $zip_code
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Hospital newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Hospital newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Hospital query()
 * @method static \Illuminate\Database\Eloquent\Builder|Hospital whereBarangay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hospital whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hospital whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hospital whereMunicipality($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hospital whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hospital whereProvince($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hospital whereRegion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hospital whereStreet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hospital whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hospital whereZipCode($value)
 */
	class Hospital extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $user_id
 * @property int $donor_number
 * @property string $first_name
 * @property string $middle_name
 * @property string $last_name
 * @property string $sex_id
 * @property string $dob
 * @property string $blood_type
 * @property string|null $occupation
 * @property string $region
 * @property string $province
 * @property string $municipality
 * @property string $barangay
 * @property string $street
 * @property string $zip_code
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|MemberDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MemberDetail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MemberDetail query()
 * @method static \Illuminate\Database\Eloquent\Builder|MemberDetail whereBarangay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemberDetail whereBloodType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemberDetail whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemberDetail whereDob($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemberDetail whereDonorNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemberDetail whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemberDetail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemberDetail whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemberDetail whereMiddleName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemberDetail whereMunicipality($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemberDetail whereOccupation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemberDetail whereProvince($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemberDetail whereRegion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemberDetail whereSexId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemberDetail whereStreet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemberDetail whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemberDetail whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemberDetail whereZipCode($value)
 * @mixin \Eloquent
 * @property int $blood_type_id
 * @method static \Illuminate\Database\Eloquent\Builder|MemberDetail whereBloodTypeId($value)
 */
	class MemberDetail extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleCategory whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleCategory whereUpdatedAt($value)
 */
	class ModuleCategory extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string|null $psgcCode
 * @property string|null $citymunDesc
 * @property int|null $regDesc
 * @property int|null $provCode
 * @property int|null $citymunCode
 * @method static \Illuminate\Database\Eloquent\Builder|Municipality newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Municipality newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Municipality query()
 * @method static \Illuminate\Database\Eloquent\Builder|Municipality whereCitymunCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Municipality whereCitymunDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Municipality whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Municipality whereProvCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Municipality wherePsgcCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Municipality whereRegDesc($value)
 * @mixin \Eloquent
 */
	class Municipality extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int|null $user_id
 * @property string $first_name
 * @property string $middle_name
 * @property string $last_name
 * @property string $dob
 * @property int $sex_id
 * @property int $blood_type_id
 * @property string $diagnosis
 * @property int $hospital_id
 * @property string $dispensed_date
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|PatientDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PatientDetail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PatientDetail query()
 * @method static \Illuminate\Database\Eloquent\Builder|PatientDetail whereBloodTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatientDetail whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatientDetail whereDiagnosis($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatientDetail whereDispensedDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatientDetail whereDob($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatientDetail whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatientDetail whereHospitalId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatientDetail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatientDetail whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatientDetail whereMiddleName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatientDetail whereSexId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatientDetail whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatientDetail whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PatientDetail whereUserId($value)
 */
	class PatientDetail extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string|null $psgcCode
 * @property string|null $provDesc
 * @property int|null $regCode
 * @property int|null $provCode
 * @method static \Illuminate\Database\Eloquent\Builder|Province newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Province newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Province query()
 * @method static \Illuminate\Database\Eloquent\Builder|Province whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Province whereProvCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Province whereProvDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Province wherePsgcCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Province whereRegCode($value)
 * @mixin \Eloquent
 */
	class Province extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string|null $psgcCode
 * @property string|null $regDesc
 * @property int|null $regCode
 * @method static \Illuminate\Database\Eloquent\Builder|Region newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Region newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Region query()
 * @method static \Illuminate\Database\Eloquent\Builder|Region whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Region wherePsgcCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Region whereRegCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Region whereRegDesc($value)
 * @mixin \Eloquent
 */
	class Region extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $admin_post_id
 * @property int $blood_request_id
 * @property int $user_id
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|RequestInterestedDonor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RequestInterestedDonor newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RequestInterestedDonor query()
 * @method static \Illuminate\Database\Eloquent\Builder|RequestInterestedDonor whereAdminPostId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestInterestedDonor whereBloodRequestId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestInterestedDonor whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestInterestedDonor whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestInterestedDonor whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestInterestedDonor whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestInterestedDonor whereUserId($value)
 */
	class RequestInterestedDonor extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $sex
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Sex newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Sex newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Sex query()
 * @method static \Illuminate\Database\Eloquent\Builder|Sex whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sex whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sex whereSex($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sex whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Sex extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $blood_bag_id
 * @property int $reason_id
 * @property string|null $remarks
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|UnsafeBloodBags newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UnsafeBloodBags newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UnsafeBloodBags query()
 * @method static \Illuminate\Database\Eloquent\Builder|UnsafeBloodBags whereBloodBagId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UnsafeBloodBags whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UnsafeBloodBags whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UnsafeBloodBags whereReasonId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UnsafeBloodBags whereRemarks($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UnsafeBloodBags whereUpdatedAt($value)
 */
	class UnsafeBloodBags extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $reason
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|UnsafeReason newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UnsafeReason newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UnsafeReason query()
 * @method static \Illuminate\Database\Eloquent\Builder|UnsafeReason whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UnsafeReason whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UnsafeReason whereReason($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UnsafeReason whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UnsafeReason whereUpdatedAt($value)
 */
	class UnsafeReason extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $role_id
 * @property string $email
 * @property string $mobile
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property mixed $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereMobile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int $isDeferred
 * @property int $isDonor
 * @property string|null $unhash_password
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIsDeferred($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIsDonor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUnhashPassword($value)
 */
	class User extends \Eloquent implements \Illuminate\Contracts\Auth\MustVerifyEmail {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $region
 * @property string $province
 * @property string $municipality
 * @property string $barangay
 * @property string $street
 * @property string $zip_code
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Venue newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Venue newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Venue query()
 * @method static \Illuminate\Database\Eloquent\Builder|Venue whereBarangay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Venue whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Venue whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Venue whereMunicipality($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Venue whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Venue whereProvince($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Venue whereRegion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Venue whereStreet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Venue whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Venue whereZipCode($value)
 */
	class Venue extends \Eloquent {}
}

