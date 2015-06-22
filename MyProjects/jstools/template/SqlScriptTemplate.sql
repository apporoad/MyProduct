
/*----------------------------------------------------------------
// Copyright (C) jumpig.com
// 版权所有。
// 文件名：{{fileName}}
// 文件功能描述：{{description}}
//
//
// 创建人：{{creator}}
// 创建日期：{{createDate}}
//
// 修改人：
// 修改描述：
//
// 修改标识：
// 修改描述：
//----------------------------------------------------------------*/

BEGIN TRANSACTION
BEGIN
   {{sqlcontent}}
END
IF @@Error <> 0
    BEGIN
        ROLLBACK TRANSACTION
    END
ELSE
    BEGIN
        COMMIT TRANSACTION
    END
