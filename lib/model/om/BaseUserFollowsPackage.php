<?php

/**
 * Base class that represents a row from the 'user_follows_package' table.
 *
 * 
 *
 * @package    lib.model.om
 */
abstract class BaseUserFollowsPackage extends BaseObject  implements Persistent {


	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        UserFollowsPackagePeer
	 */
	protected static $peer;

	/**
	 * The value for the id field.
	 * @var        string
	 */
	protected $id;

	/**
	 * The value for the user_id field.
	 * @var        int
	 */
	protected $user_id;

	/**
	 * The value for the package_id field.
	 * @var        int
	 */
	protected $package_id;

	/**
	 * The value for the update field.
	 * Note: this column has a database default value of: false
	 * @var        boolean
	 */
	protected $update;

	/**
	 * The value for the new_version field.
	 * Note: this column has a database default value of: false
	 * @var        boolean
	 */
	protected $new_version;

	/**
	 * The value for the tester field.
	 * Note: this column has a database default value of: false
	 * @var        boolean
	 */
	protected $tester;

	/**
	 * The value for the packager field.
	 * Note: this column has a database default value of: false
	 * @var        boolean
	 */
	protected $packager;

	/**
	 * The value for the comments field.
	 * @var        string
	 */
	protected $comments;

	/**
	 * @var        User
	 */
	protected $aUser;

	/**
	 * @var        Package
	 */
	protected $aPackage;

	/**
	 * @var        UserFollowsPackageHasMgaReleaseGroup one-to-one related UserFollowsPackageHasMgaReleaseGroup object
	 */
	protected $singleUserFollowsPackageHasMgaReleaseGroup;

	/**
	 * Flag to prevent endless save loop, if this object is referenced
	 * by another object which falls in this transaction.
	 * @var        boolean
	 */
	protected $alreadyInSave = false;

	/**
	 * Flag to prevent endless validation loop, if this object is referenced
	 * by another object which falls in this transaction.
	 * @var        boolean
	 */
	protected $alreadyInValidation = false;

	// symfony behavior
	
	const PEER = 'UserFollowsPackagePeer';

	/**
	 * Applies default values to this object.
	 * This method should be called from the object's constructor (or
	 * equivalent initialization method).
	 * @see        __construct()
	 */
	public function applyDefaultValues()
	{
		$this->update = false;
		$this->new_version = false;
		$this->tester = false;
		$this->packager = false;
	}

	/**
	 * Initializes internal state of BaseUserFollowsPackage object.
	 * @see        applyDefaults()
	 */
	public function __construct()
	{
		parent::__construct();
		$this->applyDefaultValues();
	}

	/**
	 * Get the [id] column value.
	 * 
	 * @return     string
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Get the [user_id] column value.
	 * 
	 * @return     int
	 */
	public function getUserId()
	{
		return $this->user_id;
	}

	/**
	 * Get the [package_id] column value.
	 * 
	 * @return     int
	 */
	public function getPackageId()
	{
		return $this->package_id;
	}

	/**
	 * Get the [update] column value.
	 * 
	 * @return     boolean
	 */
	public function getUpdate()
	{
		return $this->update;
	}

	/**
	 * Get the [new_version] column value.
	 * 
	 * @return     boolean
	 */
	public function getNewVersion()
	{
		return $this->new_version;
	}

	/**
	 * Get the [tester] column value.
	 * 
	 * @return     boolean
	 */
	public function getTester()
	{
		return $this->tester;
	}

	/**
	 * Get the [packager] column value.
	 * 
	 * @return     boolean
	 */
	public function getPackager()
	{
		return $this->packager;
	}

	/**
	 * Get the [comments] column value.
	 * 
	 * @return     string
	 */
	public function getComments()
	{
		return $this->comments;
	}

	/**
	 * Set the value of [id] column.
	 * 
	 * @param      string $v new value
	 * @return     UserFollowsPackage The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = UserFollowsPackagePeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [user_id] column.
	 * 
	 * @param      int $v new value
	 * @return     UserFollowsPackage The current object (for fluent API support)
	 */
	public function setUserId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->user_id !== $v) {
			$this->user_id = $v;
			$this->modifiedColumns[] = UserFollowsPackagePeer::USER_ID;
		}

		if ($this->aUser !== null && $this->aUser->getId() !== $v) {
			$this->aUser = null;
		}

		return $this;
	} // setUserId()

	/**
	 * Set the value of [package_id] column.
	 * 
	 * @param      int $v new value
	 * @return     UserFollowsPackage The current object (for fluent API support)
	 */
	public function setPackageId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->package_id !== $v) {
			$this->package_id = $v;
			$this->modifiedColumns[] = UserFollowsPackagePeer::PACKAGE_ID;
		}

		if ($this->aPackage !== null && $this->aPackage->getId() !== $v) {
			$this->aPackage = null;
		}

		return $this;
	} // setPackageId()

	/**
	 * Set the value of [update] column.
	 * 
	 * @param      boolean $v new value
	 * @return     UserFollowsPackage The current object (for fluent API support)
	 */
	public function setUpdate($v)
	{
		if ($v !== null) {
			$v = (boolean) $v;
		}

		if ($this->update !== $v || $this->isNew()) {
			$this->update = $v;
			$this->modifiedColumns[] = UserFollowsPackagePeer::UPDATE;
		}

		return $this;
	} // setUpdate()

	/**
	 * Set the value of [new_version] column.
	 * 
	 * @param      boolean $v new value
	 * @return     UserFollowsPackage The current object (for fluent API support)
	 */
	public function setNewVersion($v)
	{
		if ($v !== null) {
			$v = (boolean) $v;
		}

		if ($this->new_version !== $v || $this->isNew()) {
			$this->new_version = $v;
			$this->modifiedColumns[] = UserFollowsPackagePeer::NEW_VERSION;
		}

		return $this;
	} // setNewVersion()

	/**
	 * Set the value of [tester] column.
	 * 
	 * @param      boolean $v new value
	 * @return     UserFollowsPackage The current object (for fluent API support)
	 */
	public function setTester($v)
	{
		if ($v !== null) {
			$v = (boolean) $v;
		}

		if ($this->tester !== $v || $this->isNew()) {
			$this->tester = $v;
			$this->modifiedColumns[] = UserFollowsPackagePeer::TESTER;
		}

		return $this;
	} // setTester()

	/**
	 * Set the value of [packager] column.
	 * 
	 * @param      boolean $v new value
	 * @return     UserFollowsPackage The current object (for fluent API support)
	 */
	public function setPackager($v)
	{
		if ($v !== null) {
			$v = (boolean) $v;
		}

		if ($this->packager !== $v || $this->isNew()) {
			$this->packager = $v;
			$this->modifiedColumns[] = UserFollowsPackagePeer::PACKAGER;
		}

		return $this;
	} // setPackager()

	/**
	 * Set the value of [comments] column.
	 * 
	 * @param      string $v new value
	 * @return     UserFollowsPackage The current object (for fluent API support)
	 */
	public function setComments($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->comments !== $v) {
			$this->comments = $v;
			$this->modifiedColumns[] = UserFollowsPackagePeer::COMMENTS;
		}

		return $this;
	} // setComments()

	/**
	 * Indicates whether the columns in this object are only set to default values.
	 *
	 * This method can be used in conjunction with isModified() to indicate whether an object is both
	 * modified _and_ has some values set which are non-default.
	 *
	 * @return     boolean Whether the columns in this object are only been set with default values.
	 */
	public function hasOnlyDefaultValues()
	{
			if ($this->update !== false) {
				return false;
			}

			if ($this->new_version !== false) {
				return false;
			}

			if ($this->tester !== false) {
				return false;
			}

			if ($this->packager !== false) {
				return false;
			}

		// otherwise, everything was equal, so return TRUE
		return true;
	} // hasOnlyDefaultValues()

	/**
	 * Hydrates (populates) the object variables with values from the database resultset.
	 *
	 * An offset (0-based "start column") is specified so that objects can be hydrated
	 * with a subset of the columns in the resultset rows.  This is needed, for example,
	 * for results of JOIN queries where the resultset row includes columns from two or
	 * more tables.
	 *
	 * @param      array $row The row returned by PDOStatement->fetch(PDO::FETCH_NUM)
	 * @param      int $startcol 0-based offset column which indicates which restultset column to start with.
	 * @param      boolean $rehydrate Whether this object is being re-hydrated from the database.
	 * @return     int next starting column
	 * @throws     PropelException  - Any caught Exception will be rewrapped as a PropelException.
	 */
	public function hydrate($row, $startcol = 0, $rehydrate = false)
	{
		try {

			$this->id = ($row[$startcol + 0] !== null) ? (string) $row[$startcol + 0] : null;
			$this->user_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->package_id = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
			$this->update = ($row[$startcol + 3] !== null) ? (boolean) $row[$startcol + 3] : null;
			$this->new_version = ($row[$startcol + 4] !== null) ? (boolean) $row[$startcol + 4] : null;
			$this->tester = ($row[$startcol + 5] !== null) ? (boolean) $row[$startcol + 5] : null;
			$this->packager = ($row[$startcol + 6] !== null) ? (boolean) $row[$startcol + 6] : null;
			$this->comments = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			// FIXME - using NUM_COLUMNS may be clearer.
			return $startcol + 8; // 8 = UserFollowsPackagePeer::NUM_COLUMNS - UserFollowsPackagePeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating UserFollowsPackage object", $e);
		}
	}

	/**
	 * Checks and repairs the internal consistency of the object.
	 *
	 * This method is executed after an already-instantiated object is re-hydrated
	 * from the database.  It exists to check any foreign keys to make sure that
	 * the objects related to the current object are correct based on foreign key.
	 *
	 * You can override this method in the stub class, but you should always invoke
	 * the base method from the overridden method (i.e. parent::ensureConsistency()),
	 * in case your model changes.
	 *
	 * @throws     PropelException
	 */
	public function ensureConsistency()
	{

		if ($this->aUser !== null && $this->user_id !== $this->aUser->getId()) {
			$this->aUser = null;
		}
		if ($this->aPackage !== null && $this->package_id !== $this->aPackage->getId()) {
			$this->aPackage = null;
		}
	} // ensureConsistency

	/**
	 * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
	 *
	 * This will only work if the object has been saved and has a valid primary key set.
	 *
	 * @param      boolean $deep (optional) Whether to also de-associated any related objects.
	 * @param      PropelPDO $con (optional) The PropelPDO connection to use.
	 * @return     void
	 * @throws     PropelException - if this object is deleted, unsaved or doesn't have pk match in db
	 */
	public function reload($deep = false, PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("Cannot reload a deleted object.");
		}

		if ($this->isNew()) {
			throw new PropelException("Cannot reload an unsaved object.");
		}

		if ($con === null) {
			$con = Propel::getConnection(UserFollowsPackagePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = UserFollowsPackagePeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aUser = null;
			$this->aPackage = null;
			$this->singleUserFollowsPackageHasMgaReleaseGroup = null;

		} // if (deep)
	}

	/**
	 * Removes this object from datastore and sets delete attribute.
	 *
	 * @param      PropelPDO $con
	 * @return     void
	 * @throws     PropelException
	 * @see        BaseObject::setDeleted()
	 * @see        BaseObject::isDeleted()
	 */
	public function delete(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(UserFollowsPackagePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BaseUserFollowsPackage:delete:pre') as $callable)
			{
			  if (call_user_func($callable, $this, $con))
			  {
			    $con->commit();
			
			    return;
			  }
			}

			if ($ret) {
				UserFollowsPackagePeer::doDelete($this, $con);
				$this->postDelete($con);
				// symfony_behaviors behavior
				foreach (sfMixer::getCallables('BaseUserFollowsPackage:delete:post') as $callable)
				{
				  call_user_func($callable, $this, $con);
				}

				$this->setDeleted(true);
				$con->commit();
			} else {
				$con->commit();
			}
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Persists this object to the database.
	 *
	 * If the object is new, it inserts it; otherwise an update is performed.
	 * All modified related objects will also be persisted in the doSave()
	 * method.  This method wraps all precipitate database operations in a
	 * single transaction.
	 *
	 * @param      PropelPDO $con
	 * @return     int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws     PropelException
	 * @see        doSave()
	 */
	public function save(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(UserFollowsPackagePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		$isInsert = $this->isNew();
		try {
			$ret = $this->preSave($con);
			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BaseUserFollowsPackage:save:pre') as $callable)
			{
			  if (is_integer($affectedRows = call_user_func($callable, $this, $con)))
			  {
			    $con->commit();
			
			    return $affectedRows;
			  }
			}

			if ($isInsert) {
				$ret = $ret && $this->preInsert($con);
			} else {
				$ret = $ret && $this->preUpdate($con);
			}
			if ($ret) {
				$affectedRows = $this->doSave($con);
				if ($isInsert) {
					$this->postInsert($con);
				} else {
					$this->postUpdate($con);
				}
				$this->postSave($con);
				// symfony_behaviors behavior
				foreach (sfMixer::getCallables('BaseUserFollowsPackage:save:post') as $callable)
				{
				  call_user_func($callable, $this, $con, $affectedRows);
				}

				UserFollowsPackagePeer::addInstanceToPool($this);
			} else {
				$affectedRows = 0;
			}
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Performs the work of inserting or updating the row in the database.
	 *
	 * If the object is new, it inserts it; otherwise an update is performed.
	 * All related objects are also updated in this method.
	 *
	 * @param      PropelPDO $con
	 * @return     int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws     PropelException
	 * @see        save()
	 */
	protected function doSave(PropelPDO $con)
	{
		$affectedRows = 0; // initialize var to track total num of affected rows
		if (!$this->alreadyInSave) {
			$this->alreadyInSave = true;

			// We call the save method on the following object(s) if they
			// were passed to this object by their coresponding set
			// method.  This object relates to these object(s) by a
			// foreign key reference.

			if ($this->aUser !== null) {
				if ($this->aUser->isModified() || $this->aUser->isNew()) {
					$affectedRows += $this->aUser->save($con);
				}
				$this->setUser($this->aUser);
			}

			if ($this->aPackage !== null) {
				if ($this->aPackage->isModified() || $this->aPackage->isNew()) {
					$affectedRows += $this->aPackage->save($con);
				}
				$this->setPackage($this->aPackage);
			}


			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = UserFollowsPackagePeer::doInsert($this, $con);
					$affectedRows += 1; // we are assuming that there is only 1 row per doInsert() which
										 // should always be true here (even though technically
										 // BasePeer::doInsert() can insert multiple rows).

					$this->setNew(false);
				} else {
					$affectedRows += UserFollowsPackagePeer::doUpdate($this, $con);
				}

				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			if ($this->singleUserFollowsPackageHasMgaReleaseGroup !== null) {
				if (!$this->singleUserFollowsPackageHasMgaReleaseGroup->isDeleted()) {
						$affectedRows += $this->singleUserFollowsPackageHasMgaReleaseGroup->save($con);
				}
			}

			$this->alreadyInSave = false;

		}
		return $affectedRows;
	} // doSave()

	/**
	 * Array of ValidationFailed objects.
	 * @var        array ValidationFailed[]
	 */
	protected $validationFailures = array();

	/**
	 * Gets any ValidationFailed objects that resulted from last call to validate().
	 *
	 *
	 * @return     array ValidationFailed[]
	 * @see        validate()
	 */
	public function getValidationFailures()
	{
		return $this->validationFailures;
	}

	/**
	 * Validates the objects modified field values and all objects related to this table.
	 *
	 * If $columns is either a column name or an array of column names
	 * only those columns are validated.
	 *
	 * @param      mixed $columns Column name or an array of column names.
	 * @return     boolean Whether all columns pass validation.
	 * @see        doValidate()
	 * @see        getValidationFailures()
	 */
	public function validate($columns = null)
	{
		$res = $this->doValidate($columns);
		if ($res === true) {
			$this->validationFailures = array();
			return true;
		} else {
			$this->validationFailures = $res;
			return false;
		}
	}

	/**
	 * This function performs the validation work for complex object models.
	 *
	 * In addition to checking the current object, all related objects will
	 * also be validated.  If all pass then <code>true</code> is returned; otherwise
	 * an aggreagated array of ValidationFailed objects will be returned.
	 *
	 * @param      array $columns Array of column names to validate.
	 * @return     mixed <code>true</code> if all validations pass; array of <code>ValidationFailed</code> objets otherwise.
	 */
	protected function doValidate($columns = null)
	{
		if (!$this->alreadyInValidation) {
			$this->alreadyInValidation = true;
			$retval = null;

			$failureMap = array();


			// We call the validate method on the following object(s) if they
			// were passed to this object by their coresponding set
			// method.  This object relates to these object(s) by a
			// foreign key reference.

			if ($this->aUser !== null) {
				if (!$this->aUser->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aUser->getValidationFailures());
				}
			}

			if ($this->aPackage !== null) {
				if (!$this->aPackage->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aPackage->getValidationFailures());
				}
			}


			if (($retval = UserFollowsPackagePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->singleUserFollowsPackageHasMgaReleaseGroup !== null) {
					if (!$this->singleUserFollowsPackageHasMgaReleaseGroup->validate($columns)) {
						$failureMap = array_merge($failureMap, $this->singleUserFollowsPackageHasMgaReleaseGroup->getValidationFailures());
					}
				}


			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	/**
	 * Retrieves a field from the object by name passed in as a string.
	 *
	 * @param      string $name name
	 * @param      string $type The type of fieldname the $name is of:
	 *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     mixed Value of field.
	 */
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = UserFollowsPackagePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		$field = $this->getByPosition($pos);
		return $field;
	}

	/**
	 * Retrieves a field from the object by Position as specified in the xml schema.
	 * Zero-based.
	 *
	 * @param      int $pos position in xml schema
	 * @return     mixed Value of field at $pos
	 */
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getUserId();
				break;
			case 2:
				return $this->getPackageId();
				break;
			case 3:
				return $this->getUpdate();
				break;
			case 4:
				return $this->getNewVersion();
				break;
			case 5:
				return $this->getTester();
				break;
			case 6:
				return $this->getPackager();
				break;
			case 7:
				return $this->getComments();
				break;
			default:
				return null;
				break;
		} // switch()
	}

	/**
	 * Exports the object as an array.
	 *
	 * You can specify the key type of the array by passing one of the class
	 * type constants.
	 *
	 * @param      string $keyType (optional) One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                        BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. Defaults to BasePeer::TYPE_PHPNAME.
	 * @param      boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns.  Defaults to TRUE.
	 * @return     an associative array containing the field names (as keys) and field values
	 */
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true)
	{
		$keys = UserFollowsPackagePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getUserId(),
			$keys[2] => $this->getPackageId(),
			$keys[3] => $this->getUpdate(),
			$keys[4] => $this->getNewVersion(),
			$keys[5] => $this->getTester(),
			$keys[6] => $this->getPackager(),
			$keys[7] => $this->getComments(),
		);
		return $result;
	}

	/**
	 * Sets a field from the object by name passed in as a string.
	 *
	 * @param      string $name peer name
	 * @param      mixed $value field value
	 * @param      string $type The type of fieldname the $name is of:
	 *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     void
	 */
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = UserFollowsPackagePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	/**
	 * Sets a field from the object by Position as specified in the xml schema.
	 * Zero-based.
	 *
	 * @param      int $pos position in xml schema
	 * @param      mixed $value field value
	 * @return     void
	 */
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setUserId($value);
				break;
			case 2:
				$this->setPackageId($value);
				break;
			case 3:
				$this->setUpdate($value);
				break;
			case 4:
				$this->setNewVersion($value);
				break;
			case 5:
				$this->setTester($value);
				break;
			case 6:
				$this->setPackager($value);
				break;
			case 7:
				$this->setComments($value);
				break;
		} // switch()
	}

	/**
	 * Populates the object using an array.
	 *
	 * This is particularly useful when populating an object from one of the
	 * request arrays (e.g. $_POST).  This method goes through the column
	 * names, checking to see whether a matching key exists in populated
	 * array. If so the setByName() method is called for that column.
	 *
	 * You can specify the key type of the array by additionally passing one
	 * of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
	 * BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
	 * The default key type is the column's phpname (e.g. 'AuthorId')
	 *
	 * @param      array  $arr     An array to populate the object from.
	 * @param      string $keyType The type of keys the array uses.
	 * @return     void
	 */
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = UserFollowsPackagePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setUserId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setPackageId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setUpdate($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setNewVersion($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setTester($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setPackager($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setComments($arr[$keys[7]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(UserFollowsPackagePeer::DATABASE_NAME);

		if ($this->isColumnModified(UserFollowsPackagePeer::ID)) $criteria->add(UserFollowsPackagePeer::ID, $this->id);
		if ($this->isColumnModified(UserFollowsPackagePeer::USER_ID)) $criteria->add(UserFollowsPackagePeer::USER_ID, $this->user_id);
		if ($this->isColumnModified(UserFollowsPackagePeer::PACKAGE_ID)) $criteria->add(UserFollowsPackagePeer::PACKAGE_ID, $this->package_id);
		if ($this->isColumnModified(UserFollowsPackagePeer::UPDATE)) $criteria->add(UserFollowsPackagePeer::UPDATE, $this->update);
		if ($this->isColumnModified(UserFollowsPackagePeer::NEW_VERSION)) $criteria->add(UserFollowsPackagePeer::NEW_VERSION, $this->new_version);
		if ($this->isColumnModified(UserFollowsPackagePeer::TESTER)) $criteria->add(UserFollowsPackagePeer::TESTER, $this->tester);
		if ($this->isColumnModified(UserFollowsPackagePeer::PACKAGER)) $criteria->add(UserFollowsPackagePeer::PACKAGER, $this->packager);
		if ($this->isColumnModified(UserFollowsPackagePeer::COMMENTS)) $criteria->add(UserFollowsPackagePeer::COMMENTS, $this->comments);

		return $criteria;
	}

	/**
	 * Builds a Criteria object containing the primary key for this object.
	 *
	 * Unlike buildCriteria() this method includes the primary key values regardless
	 * of whether or not they have been modified.
	 *
	 * @return     Criteria The Criteria object containing value(s) for primary key(s).
	 */
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(UserFollowsPackagePeer::DATABASE_NAME);

		$criteria->add(UserFollowsPackagePeer::ID, $this->id);

		return $criteria;
	}

	/**
	 * Returns the primary key for this object (row).
	 * @return     string
	 */
	public function getPrimaryKey()
	{
		return $this->getId();
	}

	/**
	 * Generic method to set the primary key (id column).
	 *
	 * @param      string $key Primary key.
	 * @return     void
	 */
	public function setPrimaryKey($key)
	{
		$this->setId($key);
	}

	/**
	 * Sets contents of passed object to values from current object.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      object $copyObj An object of UserFollowsPackage (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setId($this->id);

		$copyObj->setUserId($this->user_id);

		$copyObj->setPackageId($this->package_id);

		$copyObj->setUpdate($this->update);

		$copyObj->setNewVersion($this->new_version);

		$copyObj->setTester($this->tester);

		$copyObj->setPackager($this->packager);

		$copyObj->setComments($this->comments);


		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			$relObj = $this->getUserFollowsPackageHasMgaReleaseGroup();
			if ($relObj) {
				$copyObj->setUserFollowsPackageHasMgaReleaseGroup($relObj->copy($deepCopy));
			}

		} // if ($deepCopy)


		$copyObj->setNew(true);

	}

	/**
	 * Makes a copy of this object that will be inserted as a new row in table when saved.
	 * It creates a new object filling in the simple attributes, but skipping any primary
	 * keys that are defined for the table.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @return     UserFollowsPackage Clone of current object.
	 * @throws     PropelException
	 */
	public function copy($deepCopy = false)
	{
		// we use get_class(), because this might be a subclass
		$clazz = get_class($this);
		$copyObj = new $clazz();
		$this->copyInto($copyObj, $deepCopy);
		return $copyObj;
	}

	/**
	 * Returns a peer instance associated with this om.
	 *
	 * Since Peer classes are not to have any instance attributes, this method returns the
	 * same instance for all member of this class. The method could therefore
	 * be static, but this would prevent one from overriding the behavior.
	 *
	 * @return     UserFollowsPackagePeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new UserFollowsPackagePeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a User object.
	 *
	 * @param      User $v
	 * @return     UserFollowsPackage The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setUser(User $v = null)
	{
		if ($v === null) {
			$this->setUserId(NULL);
		} else {
			$this->setUserId($v->getId());
		}

		$this->aUser = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the User object, it will not be re-added.
		if ($v !== null) {
			$v->addUserFollowsPackage($this);
		}

		return $this;
	}


	/**
	 * Get the associated User object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     User The associated User object.
	 * @throws     PropelException
	 */
	public function getUser(PropelPDO $con = null)
	{
		if ($this->aUser === null && ($this->user_id !== null)) {
			$this->aUser = UserPeer::retrieveByPk($this->user_id);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aUser->addUserFollowsPackages($this);
			 */
		}
		return $this->aUser;
	}

	/**
	 * Declares an association between this object and a Package object.
	 *
	 * @param      Package $v
	 * @return     UserFollowsPackage The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setPackage(Package $v = null)
	{
		if ($v === null) {
			$this->setPackageId(NULL);
		} else {
			$this->setPackageId($v->getId());
		}

		$this->aPackage = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Package object, it will not be re-added.
		if ($v !== null) {
			$v->addUserFollowsPackage($this);
		}

		return $this;
	}


	/**
	 * Get the associated Package object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Package The associated Package object.
	 * @throws     PropelException
	 */
	public function getPackage(PropelPDO $con = null)
	{
		if ($this->aPackage === null && ($this->package_id !== null)) {
			$this->aPackage = PackagePeer::retrieveByPk($this->package_id);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aPackage->addUserFollowsPackages($this);
			 */
		}
		return $this->aPackage;
	}

	/**
	 * Gets a single UserFollowsPackageHasMgaReleaseGroup object, which is related to this object by a one-to-one relationship.
	 *
	 * @param      PropelPDO $con
	 * @return     UserFollowsPackageHasMgaReleaseGroup
	 * @throws     PropelException
	 */
	public function getUserFollowsPackageHasMgaReleaseGroup(PropelPDO $con = null)
	{

		if ($this->singleUserFollowsPackageHasMgaReleaseGroup === null && !$this->isNew()) {
			$this->singleUserFollowsPackageHasMgaReleaseGroup = UserFollowsPackageHasMgaReleaseGroupPeer::retrieveByPK($this->id, $con);
		}

		return $this->singleUserFollowsPackageHasMgaReleaseGroup;
	}

	/**
	 * Sets a single UserFollowsPackageHasMgaReleaseGroup object as related to this object by a one-to-one relationship.
	 *
	 * @param      UserFollowsPackageHasMgaReleaseGroup $l UserFollowsPackageHasMgaReleaseGroup
	 * @return     UserFollowsPackage The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setUserFollowsPackageHasMgaReleaseGroup(UserFollowsPackageHasMgaReleaseGroup $v)
	{
		$this->singleUserFollowsPackageHasMgaReleaseGroup = $v;

		// Make sure that that the passed-in UserFollowsPackageHasMgaReleaseGroup isn't already associated with this object
		if ($v->getUserFollowsPackage() === null) {
			$v->setUserFollowsPackage($this);
		}

		return $this;
	}

	/**
	 * Resets all collections of referencing foreign keys.
	 *
	 * This method is a user-space workaround for PHP's inability to garbage collect objects
	 * with circular references.  This is currently necessary when using Propel in certain
	 * daemon or large-volumne/high-memory operations.
	 *
	 * @param      boolean $deep Whether to also clear the references on all associated objects.
	 */
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
			if ($this->singleUserFollowsPackageHasMgaReleaseGroup) {
				$this->singleUserFollowsPackageHasMgaReleaseGroup->clearAllReferences($deep);
			}
		} // if ($deep)

		$this->singleUserFollowsPackageHasMgaReleaseGroup = null;
			$this->aUser = null;
			$this->aPackage = null;
	}

	// symfony_behaviors behavior
	
	/**
	 * Calls methods defined via {@link sfMixer}.
	 */
	public function __call($method, $arguments)
	{
	  if (!$callable = sfMixer::getCallable('BaseUserFollowsPackage:'.$method))
	  {
	    throw new sfException(sprintf('Call to undefined method BaseUserFollowsPackage::%s', $method));
	  }
	
	  array_unshift($arguments, $this);
	
	  return call_user_func_array($callable, $arguments);
	}

} // BaseUserFollowsPackage