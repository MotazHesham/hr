<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Facility extends Model implements HasMedia
{
    use SoftDeletes;
    use HasMediaTrait;

    public $table = 'facilities';

    protected $appends = [
        'logo',
        'comrl_reg_image',
        'chamber_of_commerce_image',
        'vat_registeration_cerftificate',
    ];

    protected $dates = [
        'comrl_reg_expiry',
        'chamber_commerce_expiry',
        'municcipal_license_expiry',
        'civil_defense_license',
        'civil_defense_license_expiry',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'phone',
        'mailbox',
        'post_code',
        'building_number',
        'unit_number',
        'neighborhood',
        'street_number',
        'comrl_reg_num',
        'comrl_reg_expiry',
        'chamber_commerce_num',
        'chamber_commerce_expiry',
        'municipal_license_num',
        'municcipal_license_expiry',
        'civil_defense_license',
        'civil_defense_license_expiry',
        'facility_num_in_work_office',
        'facility_num_in_insurance',
        'tax_num',
        'city_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function getComrlRegExpiryAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setComrlRegExpiryAttribute($value)
    {
        $this->attributes['comrl_reg_expiry'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getChamberCommerceExpiryAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setChamberCommerceExpiryAttribute($value)
    {
        $this->attributes['chamber_commerce_expiry'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getMuniccipalLicenseExpiryAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setMuniccipalLicenseExpiryAttribute($value)
    {
        $this->attributes['municcipal_license_expiry'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getCivilDefenseLicenseAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setCivilDefenseLicenseAttribute($value)
    {
        $this->attributes['civil_defense_license'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getCivilDefenseLicenseExpiryAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setCivilDefenseLicenseExpiryAttribute($value)
    {
        $this->attributes['civil_defense_license_expiry'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getLogoAttribute()
    {
        $file = $this->getMedia('logo')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    public function getComrlRegImageAttribute()
    {
        $file = $this->getMedia('comrl_reg_image')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    public function getChamberOfCommerceImageAttribute()
    {
        $file = $this->getMedia('chamber_of_commerce_image')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    public function getVatRegisterationCerftificateAttribute()
    {
        $file = $this->getMedia('vat_registeration_cerftificate')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
